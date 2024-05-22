<?php

namespace Blomstra\FlarumSendGrid;

use Flarum\Notification\Blueprint\BlueprintInterface;
use Flarum\Notification\MailableInterface;
use Flarum\Notification\NotificationMailer as BaseNotificationMailer;
use Flarum\User\User;

class SendGridNotificationMailer extends BaseNotificationMailer
{
    public function send(MailableInterface $blueprint, User $user)
    {
        if (! $blueprint instanceof BlueprintInterface) {
            dd('work on this later');
        }

        /** @var BlueprintInterface $blueprint */
        $notification = $user->notifications()->where('type', $blueprint->getType())->latest()->first();

        dd(
            $blueprint->getEmailView(),
        );
    }
}
