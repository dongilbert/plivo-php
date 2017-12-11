<?php

namespace Teblig\Plivo\Laravel\Facade;

use Illuminate\Support\Facades\Facade;

class Plivo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'plivo';
    }
}