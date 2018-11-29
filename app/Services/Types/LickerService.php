<?php

namespace App\Services\Types;

class LickerService extends AdminService
{
    protected $emo = [
        '(liemmanhinh3)',
        '(liemmanhinh5)',
        '(liemmanhinh6)',
    ];

    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);
        $targetUserId = $this->extractUserId($msg);

        if (!$targetUserId) {
            return '[To:' . $fromId . ']' . PHP_EOL
                . ' (ngu)';
        }

        if ($targetUserId != env('ADMIN_CW_ID')
            && $targetUserId != env('HBOT_CW_ID')
        ) {
            $emotionNo1 = $emotionNo2 = $emotionNo3 = $this->emo[array_rand($this->emo)];

            return '[To:' . $targetUserId . ']' . PHP_EOL
                . '(aigo2) ' . PHP_EOL
                . PHP_EOL
                . $emotionNo1 . ' ' . $emotionNo2 . ' ' . $emotionNo3;
        } else {
            return '[To:' . $fromId . ']' . PHP_EOL
                . ' (nonono)' . PHP_EOL
                . ' (tat2)';
        }
    }
}
