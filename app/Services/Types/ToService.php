<?php

namespace App\Services\Types;

class ToService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);
        $content = $this->extractContent($msg);

        if ($fromId == env('ADMIN_CW_ID')
            || $fromId == env('SUB_ADMIN_CW_ID')
        ) {
            return $content;
        } else {
            return '[To:' . $fromId . ']' . PHP_EOL
                . ' (nonono)';
        }
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
