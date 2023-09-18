<?php

declare(strict_types=1);

namespace Rawilk\FilamentInnerNav\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Rawilk\FilamentInnerNav\FilamentInnerNavServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            FilamentInnerNavServiceProvider::class,
        ];
    }
}
