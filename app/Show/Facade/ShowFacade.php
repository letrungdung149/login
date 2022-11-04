<?php

namespace App\Show\Facade;

use Illuminate\Support\Facades\Facade;

class ShowFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'show';
    }
}
