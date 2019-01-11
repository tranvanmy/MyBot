<?php

namespace App\Services\Types;

use Cmfcmf\OpenWeatherMap;

class WeatherService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        $weather = $this->getCurrentWeather();
        extract($weather);
        extract($data);

        return "[rp aid=$userId to=$roomId-$messId]\n"
            . "Nhiệt độ Hà Nội hiện tại: $temperature độ C - $desc";
    }

    /**
     * Get current time weather
     *
     * @return array
     */
    public function getCurrentWeather()
    {
        try {
            $weatherApi = new OpenWeatherMap('62bba70fc64c0b7c79afc83bfe487e63');
            $weather = $weatherApi->getWeather('Hanoi', 'metric', 'vi');

            return [
                'temperature' => $weather->temperature->getValue(),
                'desc' => ucfirst(strtolower($weather->clouds->getDescription())),
            ];
        } catch (\Exception $e) {
            logger($e);
        }
    }
}
