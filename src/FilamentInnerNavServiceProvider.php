<?php

namespace Rawilk\FilamentInnerNav;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Rawilk\FilamentInnerNav\Commands\FilamentInnerNavCommand;

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
