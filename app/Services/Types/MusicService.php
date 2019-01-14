<?php

namespace App\Services\Types;

use Cmfcmf\OpenWeatherMap;

class MusicService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);

        $musicId = range(1, 100);
        $number = range(0, 3);
        $listMusic = [
            'https://www.nhaccuatui.com/playlist/top-100-nhac-tre-hay-nhat-va.m3liaiy6vVsF.html?st=',
            'https://www.nhaccuatui.com/playlist/top-100-pop-usuk-hay-nhat-va.zE23R7bc8e9X.html?st=',
            'https://www.nhaccuatui.com/playlist/top-100-nhac-han-hay-nhat-va.iciV0mD8L9Ed.html?st=',
            'https://www.nhaccuatui.com/playlist/top-100-nhac-khong-loi-hay-nhat-va.kr9KYNtkzmnA.html?st=',
        ];

        $random_id = array_rand($musicId, 1);
        $random_list = array_rand($number, 1);

        return "[rp aid=$userId to=$roomId-$messId]\n"
            . 'Nhạc hay mỗi ngày' . PHP_EOL
            . ' '.$listMusic[$random_list].$random_id.' '.' ' . PHP_EOL;
    }
}
