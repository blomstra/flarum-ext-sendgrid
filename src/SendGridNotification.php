<?php

namespace Blomstra\FlarumSendGrid;

use Flarum\Database\AbstractModel;

class SendGridNotification extends AbstractModel
{
    protected $table = 'send_grid_notifications';

    protected $guarded = [];
}
