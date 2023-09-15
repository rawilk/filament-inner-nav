<?php

declare(strict_types=1);

namespace Rawilk\FilamentInnerNav\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Rawilk\FilamentInnerNav\FilamentInnerNavServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Rawilk\\FilamentInnerNav\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    public function getEnvironmentSetUp($app)
    {
        // include_once __DIR__ . '/../database/migrations/create_filament-inner-nav_table.php.stub';
        // (new \CreatePackageTable())->up();
    }

    protected function getPackageProviders($app): array
    {
        return [
            FilamentInnerNavServiceProvider::class,
        ];
    }
}
