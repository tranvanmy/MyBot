<?php

namespace App\Services\Types;

use App\Services\Types\Service;

class DefaultService extends Service
{
    protected $option = [
        '(?)',
        '(??)',
        '(???)',
        '(seriously?)',
        '(what?)',
        '(problem?)',
        '(wow)',
        '(wtf2)',
        '(idontknow)',
        '(idontcare)',
    ];
}
