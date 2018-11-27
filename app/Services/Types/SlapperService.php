<?php

namespace App\Services\Types;

class SlapperService extends AdminService
{
    /**
     * Create response message for weather service
     */
    public function createResponse($data)
    {
        extract($data);
        if ($fromId == env('ADMIN_CW_ID')) {
            $targetUserId = $this->extractUserId($msg);

            return '[To:{$targetUserId}] \n'
                . 'Ê ku !' . PHP_EOL
                . '(laiday3) ' . PHP_EOL
                . '\n'
                . '(tat2) (lengoi) (dam)';
        } else {
            return '[To:{$fromId}] \n'
                . ' (nonono)';
        }
    }
}
