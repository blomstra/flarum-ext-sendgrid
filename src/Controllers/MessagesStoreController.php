<?php

namespace Blomstra\FlarumSendGrid\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;

class MessagesStoreController implements RequestHandlerInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return ['hello' => 'there'];
        $this->logger->info('Hitting the endpoint');
        $this->logger->info(
            $request->getBody()
        );

        dd('handle stuff from there');
        dd('test');
        // TODO: Implement handle() method.
    }
}
