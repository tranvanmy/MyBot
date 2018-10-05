<?php

namespace App\Services\Types;

class DefaultService
{
    /**
     * Create response message
     *
     * @param array $data
     *
     * @return string
     */
    public function createResponse(array $data)
    {
        extract($data);
        return "[rp aid=$userId to=$roomId-$messId]\n (?)";
    }
}
