<?php

namespace App\Services\Types;

use Cmfcmf\OpenWeatherMap;

class HelpService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);

        return "[rp aid=$userId to=$roomId-$messId]\n"
            . '[info][title]Danh sách những syntax hỗ trợ:[/title](*)music : Sẽ cho chúng ta 1 bài hát ngẫu nhiên giúp giảm căng thẳng
(*)weather: Sẽ cho chúng ta biết thời tiết hiện tại của Hà Nội
(*)tat: @To .Bot sẽ thay ae tát người cần tát
(*)pull: pull: title cuả pull để gửi pull request
            [/info]' . PHP_EOL;
    }
}
