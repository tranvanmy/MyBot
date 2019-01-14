<?php

namespace App\Services\Types;

class BookService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);

        return "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*)Bookmarks: https://goo.gl/qY4vvQ.[/info]' . PHP_EOL;
    }
}
