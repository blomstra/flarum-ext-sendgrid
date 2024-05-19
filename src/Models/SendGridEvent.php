<?php

namespace Blomstra\FlarumSendGrid\Models;

use Flarum\Database\AbstractModel;
use Illuminate\Database\Eloquent\Builder;

class SendGridEvent extends AbstractModel
{
    const STATUSES = ['delivered', 'processed', 'bounce', 'dropped', 'deferred'];

    const ACTIONS = ['click', 'open', 'spamreport', 'unsubscribe', 'group_unsubscribe', 'group_resubscribe'];

    protected $table = 'send_grid_events';

    protected $guarded = [];

    public function scopeStatus(Builder $query): void
    {
        $query->whereIn('event', self::STATUSES);
    }
}
