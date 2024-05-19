<?php

namespace Blomstra\FlarumSendGrid\Controllers;

use Blomstra\FlarumSendGrid\Models\SendGridMessage;
use Carbon\CarbonImmutable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;

class EventsStoreController implements RequestHandlerInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->logger->info(Arr::get($request->getParsedBody(), '0.sg_message_id'));

        $notification = SendGridMessage::query()
            ->where('external_id', Arr::get($request->getParsedBody(), '0.sg_message_id'))
            ->first();

        if (! $notification) {
            return new JsonResponse([
                'message' => 'SendGrid notification not found',
            ], $status = 404);
        }

        $notification->events()->createMany(
            Collection::make($request->getParsedBody())->map(function ($item) {
                return [
                    'event' => $item['event'],
                    'timestamp' => $item['timestamp'],
                    'created_at' => CarbonImmutable::now(),
                    'updated_at' => CarbonImmutable::now(),
                ];
            })
        );

        return new JsonResponse([
            'message' => 'SendGrid events saved',
        ], $status = 201);
    }
}
