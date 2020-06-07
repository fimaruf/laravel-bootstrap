<?php

namespace Wovosoft\LaravelBootstrap\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelBootstrap extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-bootstrap';
    }
}
