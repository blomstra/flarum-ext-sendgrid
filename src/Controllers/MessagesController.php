<?php

namespace Blomstra\FlarumSendGrid\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class MessagesController implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        dd('handle stuff from there');
        dd('test');
        // TODO: Implement handle() method.
    }
}
