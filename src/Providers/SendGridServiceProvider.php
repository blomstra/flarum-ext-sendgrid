<?php

namespace Blomstra\FlarumSendGrid\Providers;

use Blomstra\FlarumSendGrid\SendGridNotificationMailer;
use Flarum\Foundation\AbstractServiceProvider;
use Flarum\Notification\NotificationMailer as FlarumNotificationMailer;
use Flarum\Settings\SettingsRepositoryInterface;

class SendGridServiceProvider extends AbstractServiceProvider
{
    public function boot(): void
    {
        $this->container->bind(FlarumNotificationMailer::class, function ($app) {
            if ($app[SettingsRepositoryInterface::class]->get('mail_driver') !== 'sendgrid') {
                return $app[FlarumNotificationMailer::class];
            }

            return $app[SendGridNotificationMailer::class];
        });
    }
}
