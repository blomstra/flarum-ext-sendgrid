<?php

namespace Blomstra\FlarumSendGrid;

use Flarum\Queue\AbstractJob;
use Illuminate\Http\Client\PendingRequest;

class FetchDeliveryStatus extends AbstractJob
{
    private PendingRequest $request;

    public function __construct(PendingRequest $request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        $response = $this->request
            ->withToken('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', 'Bearer')
            ->get('https://api.sendgrid.com/v3/messages', [
                'msg_id' => '',
            ]);

        dd($response->body());
    }
}
