<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Cmfcmf\OpenWeatherMap;
use Carbon\Carbon;
use wataridori\ChatworkSDK\ChatworkSDK;
use wataridori\ChatworkSDK\ChatworkRoom;

class ForecastWeatherDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:today';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Forecast today weather';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            // Get weather
            $weatherApi = new OpenWeatherMap(env('OPEN_WEATHER_API_KEY'));
            $forecastWeather = $weatherApi->getRawHourlyForecastData('Hanoi', 'metric', 'vi', '', 'json');
            $forecastWeather = $this->extractTodayWeather($forecastWeather);

            // Send message
            ChatworkSDK::setApiKey(env('CHATWORK_API_KEY'));
            $room = new ChatworkRoom(env('TEAM_AN_TRUA_FS'));
            $room->sendMessage($this->constructMessage($forecastWeather));
        } catch (\Exception $e) {
            logger($e);
        }
    }

    /**
     * Extract data for only today weather
     *
     * @param json $weathers
     *
     * @return array
     */
    protected function extractTodayWeather($weathers)
    {
        $result = [];
        $weathers = json_decode($weathers, true);
        foreach ($weathers['list'] as $weather) {
            $day = Carbon::parse($weather['dt_txt']);
            if ($day->isToday()) {
                $result['min_temp'][] = $weather['main']['temp_min'];
                $result['max_temp'][] = $weather['main']['temp_max'];
                $result['desc'][] = $weather['weather'][0]['description'];
            } else {
                break;
            }
        }

        return [
            'min_temp' => round(min($result['min_temp']), 2),
            'max_temp' => round(max($result['max_temp']), 2),
            'desc' => implode(', ', array_unique($result['desc'])),
        ];
    }

    /**
     * Construct response message for chatwork
     *
     * @param array $forecastWeather
     *
     * @return string
     */
    protected function constructMessage($forecastWeather)
    {
        return '[toall] Dự báo thời tiết ngày ' . Carbon::today()->format('d/m/Y') . ':' . PHP_EOL
            . '- Nhiệt độ: ' . $forecastWeather['min_temp'] . ' đến ' . $forecastWeather['max_temp'] . ' độ C' . PHP_EOL
            . '- Thời tiết: ' . $forecastWeather['desc'];
    }
}
