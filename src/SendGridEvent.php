<?php

namespace Blomstra\FlarumSendGrid;

use Flarum\Database\AbstractModel;

class SendGridEvent extends AbstractModel
{
    protected $table = 'send_grid_events';

    protected $guarded = [];
}
