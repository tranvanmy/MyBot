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
(*)map: Sẽ cho chúng ta biết được map các phòng họp, và chỗ ngồi của công ty Framgia
(*)welcome: @To .Bot sẽ  thay mặt ae gửi lời mời cho member mới vào dự án hay box.
(*)tat: @To .Bot sẽ thay ae tát người cần tát
(*)vanhoa: Hiện văn hóa của Group ta
            [/info]' . PHP_EOL;
    }
}
