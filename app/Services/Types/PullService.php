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
            $to = '';
        } else {
            $to = '[To:5085113] [To:5102249] [To:5085124]';
        }
        $pullNumber = $this->extractPullNumber($content);

        ($userId == '5085124') ? $me = 'mình' : $me = 'em';

        $reponse = "[rp aid=$userId to=$roomId-$messId]\n"
        . $to . '
[info][title]Mọi người review giúp'.' '. $me .' '.'pull này với (bow)[/title](*) Title:' . $content . '
(*) Link: https://bitbucket.org/vmodev/unic-cms/pull-requests/'. $pullNumber .'[/info]'. PHP_EOL;

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
        $number = substr($content, strlen($content) - 2);

        return $number;
    }
}
