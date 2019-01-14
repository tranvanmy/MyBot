<?php

namespace App\Services\Types;

class MemberService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);
        return "[rp aid=$userId to=$roomId-$messId]\n"
        . '[qtmeta aid=1272369 time=1505725458][info][title]Tệp tin đã được tải lên.[/title][preview id=183426995 ht=150][download:183426995]IMG_0398.JPG (242.22 KB)[/download][/info]
[qtmeta aid=1272369 time=1505725460][info][title]Tệp tin đã được tải lên.[/title][preview id=183426996 ht=150][download:183426996]IMG_0397.JPG (293.48 KB)[/download][/info]
' . PHP_EOL;
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
        $content = trim($content);
        return $content;
    }
}
