<?php

namespace App\Services;

use App\Services\Types\DefaultService;
use App\Services\Types\SlapService;
use App\Services\Types\PunchService;
use App\Services\Types\KickService;
use App\Services\Types\HiService;
use App\Services\Types\KillService;

class ServiceEntry
{
    public static function type($type, array $data = [])
    {
        switch ($type) {
            case 'slap':
                return new SlapService;
                break;
            case 'punch':
                return new PunchService;
                break;
            case 'kick':
                return new KickService;
                break;
            case 'hi':
                return new HiService;
                break;
            case 'kill':
                return new KillService;
                break;
            default:
                return new DefaultService;
        }
    }
}
