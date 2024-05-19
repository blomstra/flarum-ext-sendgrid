<?php

namespace Blomstra\FlarumSendGrid\Models;

use Flarum\Database\AbstractModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SendGridMessage extends AbstractModel
{
    protected $table = 'send_grid_messages';

    protected $guarded = [];

    public function scopeStatus()
    {
    }

    public function events(): HasMany
    {
        return $this->hasMany(SendGridEvent::class);
    }

    public function latestEvent(): HasOne
    {
        return $this->hasOne(SendGridEvent::class)->latest('timestamp');
    }
}
