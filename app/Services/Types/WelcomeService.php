<?php

namespace App\Services\Types;

class WelcomeService extends AdminService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);
        $targetUserId = $this->extractUserId($msg);

        return '[To:' . $targetUserId . ']' . PHP_EOL
            . 'Chào mừng bạn đến với dự án GMT'
            . ' Bạn hãy giới thiệu về tên tuổi, ngày sinh, sở thích, ...'
            . '  để mọi người cùng biết nhé :D';
    }
}
