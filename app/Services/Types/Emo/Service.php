<?php

namespace App\Services\Types\Emo;

abstract class Service
{
    /**
     * Optional emotion
     */
    protected $option = [];

    /**
     * Create response message
     *
     * @param array $data
     *
     * @return string
     */
    public function createResponse(array $data)
    {
        $emotion = $this->option[array_rand($this->option)];
        extract($data);
        return "[rp aid=$userId to=$roomId-$messId]\n $emotion";
    }
}
