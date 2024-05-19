<?php

namespace Blomstra\FlarumSendGrid;

use Flarum\Database\AbstractModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SendGridNotification extends AbstractModel
{
    protected $table = 'send_grid_notifications';

    protected $guarded = [];

    public function events(): HasMany
    {
        return $this->hasMany(SendGridEvent::class);
    }

    public function latestEvent(): HasOne
    {
        return $this->hasOne(SendGridEvent::class)->latest('timestamp');
    }
}
