<?php

namespace App\Services\Types;

class WorkService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);

        return "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*)Workflow: https://goo.gl/ReQsAF.[/info]' . PHP_EOL;
    }
}
