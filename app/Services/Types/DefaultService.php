<?php

namespace App\Services\Types;

use App\Services\Types\Service;

class DefaultService extends Service
{
    protected $option = [
        '(?)',
        '(??)',
        '(dunno)',
        '(???)',
        '(seriously?)',
        '(what?)',
        '(problem?)',
        '(wow)',
        '(yeah)',
        '(wtf2)',
        '(idontknow)',
        '(idontcare)',
        '(cuoituthien)',
        '(doanxem)',
    ];
}
