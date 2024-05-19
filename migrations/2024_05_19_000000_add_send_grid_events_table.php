<?php

/*
 * This file is part of askvortsov/flarum-pwa
 *
 *  Copyright (c) 2021 Alexander Skvortsov.
 *
 *  For detailed copyright and license information, please view the
 *  LICENSE file that was distributed with this source code.
 */

use Flarum\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

return Migration::createTable(
    'send_grid_events',
    function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('send_grid_message_id');
        $table->string('event');
        $table->unsignedBigInteger('timestamp');
        $table->timestamps();

        $table->foreign('send_grid_message_id')->references('id')->on('send_grid_messages')->onDelete('cascade');
    }
);
