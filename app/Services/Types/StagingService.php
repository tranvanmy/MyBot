<?php

namespace App\Services\Types;

class StagingService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);

        return "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*) IP: 10.0.1.224
(*) Link: http://gmt.framgia.vn/
(*) Basic Auth: gmt/Framgi@2018
(*) Accounts: https://goo.gl/aCvw32.[/info]' . PHP_EOL;
    }
}
