<?php

namespace App\Services\Types\Emo;

use App\Services\Types\Emo\Service;

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
