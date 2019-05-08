<?php

namespace App\Services\Types;

class JsService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);
    }
}
