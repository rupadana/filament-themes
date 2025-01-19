<?php

namespace Rupadana\FilamentThemes\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method mixed getThemes()
 *
 * @see \Rupadana\FilamentThemes\FilamentThemes
 */
class FilamentThemes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Rupadana\FilamentThemes\FilamentThemes::class;
    }
}
