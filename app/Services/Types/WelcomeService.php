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
            . 'Chào mừng người đẹp đến với dự án GMT'
            . ' Người đẹp hãy giới thiệu bản thân, tên tuổi, địa chỉ , ngày tháng năm sinh, tình trạng hôn nhân cho ae cùng biết để tính toán nhé';
    }
}
