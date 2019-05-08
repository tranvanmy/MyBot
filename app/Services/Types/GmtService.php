<?php

namespace App\Services\Types;
use Carbon\Carbon;

class GmtService
{
    public function createResponse($data)
    {
        extract($data);

//         if ($data['roomId'] != '100652541') {
//            return "[rp aid=$userId to=$roomId-$messId]\n"
//             . '[info][title]Permission Denied[/title]
// (*)Đây là tài liệu nội bộ của dự án, nên không thể truy cập ở ngoài box, mong bạn thông cảm (bow)
//             [/info]' . PHP_EOL;
//         }
        
        $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
            . '[info][title]Permission Denied[/title]
(*)Bạn vui lòng kiểm tra lại syntax xem đã đúng hay chưa bằng câu lệnh {gmt}, hoặc liên lạc với [To:2359460] để biết thêm thông tin chi tiết (bow)
            [/info]' . PHP_EOL;

        if (strstr($data['msg'], 'gmt') == 'gmt') {
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
            . '[info][title]Danh sách những syntax hỗ trợ dự án GMT:[/title](*)gmt postman: Link đến thư mục chứa postman.json của dự án.
(*)gmt api: Link đến file api của dự án. 
(*)gmt member: Link đến file thông tin member trong dự án.
(*)gmt workflow: Link đến file workflow của dự án.
(*)gmt book: Link đến file Bookmarks của dự án.
(*)gmt git: Link github dự án.
(*)gmt gg: Link gg drive của dự án.
(*)gmt staging: Link đến serve staging của dự án.
(*)gmt report: Mẫu báo cáo hàng ngày.
(*)gmt pull: Mẫu gửi pull.
====================================
(*)help: 1 vài syntax để giải trí cho ae (len)
            [/info]' . PHP_EOL;
        }

        if (strstr($data['msg'], 'gmt member') == 'gmt member') {
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*)Member Information: https://goo.gl/82vqF.
(*)Member Role: https://goo.gl/3REwg3.[/info]' . PHP_EOL;
        }

        if (strstr($data['msg'], 'gmt workflow') == 'gmt workflow') {
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*)Workflow: https://goo.gl/ReQsAF.[/info]' . PHP_EOL;
        }

        if (strstr($data['msg'], 'gmt gg') == 'gmt gg') {
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*)Google Drive: https://drive.google.com/drive/u/0/folders/1lQep8EcsfFXH_Lv8d78eAwRQmkSVdyv5.[/info]' . PHP_EOL;
        }

        if (strstr($data['msg'], 'gmt book') == 'gmt book') {
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*)Bookmarks: https://goo.gl/qY4vvQ.[/info]' . PHP_EOL;
        }

        if (strstr($data['msg'], 'gmt git') == 'gmt git') {
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*)Pull: https://github.com/framgia/group-management-tool.[/info]' . PHP_EOL;
        }

        if (strstr($data['msg'], 'gmt staging') == 'gmt staging') {
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*) IP: 10.0.1.224
(*) Link: http://gmt.framgia.vn/
(*) Basic Auth: gmt/Framgi@2018
(*) Accounts: https://goo.gl/aCvw32.[/info]'. PHP_EOL;
        }

        if (strstr($data['msg'], 'gmt report') == 'gmt report') {
            $date = Carbon::now()->format('Y/m/d');
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . 'To..
Daily Report 
[info][title]Daily Report'.' '. $date . '[/title]Today tasks:
-
[hr]Problems and Issues
-
[hr] Next day plan
-
[hr]Free Comment

[/info]'. PHP_EOL;
        }

        if (strstr($data['msg'], 'gmt pull') == 'gmt pull') {
            \Log::error($data['msg']);
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n".
            "Mẫu gửi pull của anh đây\n"
        . '[info][title]Mọi người review giúp mình pull này với (bow)[/title](*) Title:
(*) Link: [/info]'. PHP_EOL;
        }

        if (strstr($data['msg'], 'gmt postman') == 'gmt postman') {
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*)https://drive.google.com/drive/folders/1vK9lQZQKFEWBucUsqcNig8K1PB_O7_kw?usp=sharing[/info]'. PHP_EOL;
        }

        if (strstr($data['msg'], 'gmt api') == 'gmt api') {
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*)https://docs.google.com/spreadsheets/d/15XRvwn22SxRVZke3pOHns_xJEiHyLa0zOCEkwWMi6c4/edit#gid=0.[/info]'. PHP_EOL;
        }

        if (strstr($data['msg'], 'gmt red') == 'gmt red') {
            $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . '[info][title]Của anh đây ạ (bow):[/title](*)Redmine: https://goo.gl/xQMt3K[/info]'. PHP_EOL;
        }

        
        return $reponse;
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
        return $content;
    }
}
