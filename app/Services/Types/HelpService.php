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
            . '[info][title]Danh sách những syntax hỗ trợ dự án GMT:[/title](*)gmt member: Link các quyền của member trong dự án.
(*)gmt workflow: Link đến file workflow của dự án.
(*)gmt bookmarks: Link đến file Bookmarks của dự án.
(*)gmt github: Link github dự án.
(*)gmt gg: Link gg drive của dự án.
(*)gmt stagging: Link đến serve staging của dự án.
(*)gmt report: Mẫu báo cáo hàng ngày.
(*)gmt pull: Mẫu gửi pull
            [/info]' . PHP_EOL;
    }
}
