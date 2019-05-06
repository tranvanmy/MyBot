<?php

namespace App\Services\Types;

class PullService extends AdminService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);
        $content = $this->extractContent($msg);

        if (strrpos($content, 'webapp)') != 0) {
            $to = '[To:2359460] [To:1807071] [To:2559169] [To:2559207] [To:3401286] [To:3542580] [To:3543924] [To:3525316] 
';
        } else {
            $to = '[To:2359460] [To:1807071] [To:2559169] [To:2559207] [To:3401286] [To:3542580] [To:3543924] [To:3525316] 
]';
        }
        $pullNumber = $this->extractPullNumber($content);

        ($userId == '2359460') ? $me = 'mình' : $me = 'em';

        $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . $to . '
[info][title]Mọi người review giúp'.' '. $me .' '.'pull này với (bow)[/title](*) Title:' . $content . '
(*) Link: https://github.com/framgia/group-management-tool/pull/'. $pullNumber .'[/info]'. PHP_EOL;

        return $reponse;
    }

    public function extractContent($msg)
    {
        $content = substr($msg, strpos($msg, ':') + 1);
        $content = trim($content, '}');

        return $content;
    }

    public function extractPullNumber($content)
    {
        $number = substr($content, strlen($content) - 3);

        return $number;
    }
}
