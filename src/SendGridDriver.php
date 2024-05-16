<?php

namespace Blomstra\FlarumSendGrid;

use Flarum\Mail\DriverInterface;
use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Mail\Transport\MailgunTransport;
use Illuminate\Support\MessageBag;
use SendGrid;
use Swift_Transport;

class SendGridDriver implements DriverInterface
{
    public function __construct()
    {
    }

    public function availableSettings(): array
    {
        return [
            'mail_sendgrid_secret' => '', // the secret key
            'mail_sendgrid_domain' => '', // the API base URL
            'mail_sendgrid_region' => [ // region's endpoint
                'api.mailgun.net' => 'US',
                'api.eu.mailgun.net' => 'EU',
            ],
        ];
    }

    public function validate(SettingsRepositoryInterface $settings, Factory $validator): MessageBag
    {
        return $validator->make($settings->all(), [
            'mail_sendgrid_secret' => 'required',
            // 'mail_sendgrid_domain' => 'required|regex:/^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/',
            // 'mail_sendgrid_region' => 'required|in:api.mailgun.net,api.eu.mailgun.net',
        ])->errors();
    }

    public function canSend(): bool
    {
        return true;
    }

    public function buildTransport(SettingsRepositoryInterface $settings): Swift_Transport
    {
        return new SendGridTransport(
            new SendGrid($settings->get('mail_sendgrid_secret'))
        );
    }
}
