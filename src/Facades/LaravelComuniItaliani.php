<?php

namespace Dariob\LaravelComuniItaliani\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Dariob\LaravelComuniItaliani\LaravelComuniItaliani
 */
class LaravelComuniItaliani extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Dariob\LaravelComuniItaliani\LaravelComuniItaliani::class;
    }
}
