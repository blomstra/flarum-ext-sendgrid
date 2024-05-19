<?php

/*
 * This file is part of blomstra/flarum-sendgrid.
 *
 * Copyright (c) 2024 Jaggy Gauran.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Blomstra\FlarumSendGrid;

use Blomstra\FlarumSendGrid\Controllers\MessagesController;
use Flarum\Extend;

return [
    (new Extend\Mail())->driver('sendgrid', SendGridDriver::class),
    (new Extend\Routes('api'))->get('/flarum-sendgrid/hooks/messages', 'flarum-sendgrid.hooks.messages', MessagesController::class),
    //    (new Extend\Frontend('forum'))
    //        ->js(__DIR__.'/js/dist/forum.js')
    //        ->css(__DIR__.'/less/forum.less'),
    //    (new Extend\Frontend('admin'))
    //        ->js(__DIR__.'/js/dist/admin.js')
    //        ->css(__DIR__.'/less/admin.less'),
    //    new Extend\Locales(__DIR__.'/locale'),
];
