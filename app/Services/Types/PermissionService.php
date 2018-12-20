<?php

namespace App\Services\Types;

use App\Models\User;
use wataridori\ChatworkSDK\ChatworkSDK;
use wataridori\ChatworkSDK\ChatworkRoom;
use Carbon\Carbon;

class PermissionService
{
    /**
     * Create response message for permission service
     */
    public function createResponse($data)
    {
        extract($data);
        if ($fromId != env('ADMIN_CW_ID')) {
            return '[To:' . $fromId . ']' . PHP_EOL
                . ' (nonono)';
        }

        $choosenMemberAccId = $this->chooseRandomMember();
        $msg = $this->sendCongratulations($choosenMemberAccId);

        return $msg;
    }

    private function chooseRandomMember()
    {
        $members = User::where([
            ['role', 'member'],
            ['priority', '>', '0'],
        ])
        ->get();
        $random = $this->transformMemberData($members);
        shuffle($random);
        $choosenMemberAccId = $random[array_rand($random)];

        return $choosenMemberAccId;
    }

    private function transformMemberData($members)
    {
        $random = [];
        foreach ($members as $member) {
            if ($member['priority'] == 1) {
                array_push($random, (int) $member['account_id']);
            } else {
                $tmp = array_fill(0, (int) $member['priority'], (int) $member['account_id']);
                $random = array_merge($random, $tmp);
            }
        }

        return $random;
    }

    private function sendCongratulations($memberId)
    {
        return '[To:' . $memberId . '] ' . PHP_EOL
            . 'Chúc mừng bạn đã quay vào ô mất lượt (tangqua)';
    }
}
