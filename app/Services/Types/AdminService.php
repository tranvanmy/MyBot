<?php

namespace App\Services\Types;

abstract class AdminService
{
    /**
     * Extract user id from message
     *
     * @param string $msg
     *
     * @return string
     */
    protected function extractUserId($msg)
    {
        $msgSegment = explode(':', $msg);
        $targetUserId = substr($msgSegment[2], 0, strpos($msgSegment[2], ']'));

        return $targetUserId;
    }
}
