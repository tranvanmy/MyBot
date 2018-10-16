<?php

namespace App\Services\Types;

use Cmfcmf\OpenWeatherMap;

class MapService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);

        return "[rp aid=$userId to=$roomId-$messId]\n"
            . 'Keangnam Office Map:' . PHP_EOL
            . ' - Fizz: https://goo.gl/OZpKsp' . PHP_EOL
            . ' - Buzz: https://goo.gl/5aTpMX' . PHP_EOL;
    }
}
