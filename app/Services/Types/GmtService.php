<?php

namespace App\Services\Types;

use Cmfcmf\OpenWeatherMap;

class GmtService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {

        \Log::error('data');
        \Log::error($data['msg']);
        \Log::error('data');
        extract($data);

        return "[rp aid=$userId to=$roomId-$messId]\n"
            . '[info][title]Danh sách những syntax hỗ trợ dự án GMT:[/title](*)gmt member: Link đến file thông tin member trong dự án.
(*)gmt workflow: Link đến file workflow của dự án.
(*)gmt book: Link đến file Bookmarks của dự án.
(*)gmt github: Link github dự án.
(*)gmt gg: Link gg drive của dự án.
(*)gmt staging: Link đến serve staging của dự án.
(*)gmt report: Mẫu báo cáo hàng ngày.
(*)gmt pull: Mẫu gửi pull
            [/info]' . PHP_EOL;
    }


    /**
     * Extract main content from keyword
     *
     * @param string $msg
     *
     * @return string
     */
    public function extractContent($msg)
    {
        $content = substr($msg, strpos($msg, ':') + 1);
        $content = trim($content, '}');

        return $content;
    }
}
