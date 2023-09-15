<?php

declare(strict_types=1);

namespace Rawilk\FilamentInnerNav;

use Rawilk\FilamentInnerNav\Commands\FilamentInnerNavCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentInnerNavServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-inner-nav')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommand(FilamentInnerNavCommand::class);
    }
}
