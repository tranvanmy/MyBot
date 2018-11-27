<?php

namespace App\Services\Types;

class SlapperService extends AdminService
{
    protected $emo = [
        '(songphi2)',
        '(sucvat)',
        '(phonglon)',
        '(xien)',
        '(2tat)',
        '(tat2)',
        '(tat3)',
        '(tat4)',
    ];

    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);
        $targetUserId = $this->extractUserId($msg);

        if (!$targetUserId) {
            return '[To:' .  $fromId . ']' . PHP_EOL
            . ' (kidding?)';
        }

        if ($targetUserId != env('ADMIN_CW_ID')) {
            $emotionNo1 = $this->emo[array_rand($this->option)];
            $emotionNo2 = $this->emo[array_rand($this->option)];
            $emotionNo3 = $this->emo[array_rand($this->option)];

            return '[To:' . $targetUserId . ']' . PHP_EOL
                . '(laiday3) ' . PHP_EOL
                . PHP_EOL
                . $emotionNo1 . ' ' . $emotionNo2 . ' ' . $emotionNo3;
        } else {
            return '[To:' .  $fromId . ']' . PHP_EOL
                . ' (nonono)' . PHP_EOL
                . ' (tat2)';
        }
    }
}
