<?php

namespace App\Services\Types;

class MemberService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);

        return "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*)Member Information: https://goo.gl/82vqF.
(*)Member Role: https://goo.gl/3REwg3.[/info]' . PHP_EOL;
    }
}
