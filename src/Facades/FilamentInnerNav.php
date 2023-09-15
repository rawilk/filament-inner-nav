<?php

declare(strict_types=1);

namespace Rawilk\FilamentInnerNav\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rawilk\FilamentInnerNav\FilamentInnerNav
 */
class FilamentInnerNav extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Rawilk\FilamentInnerNav\FilamentInnerNav::class;
    }
}
