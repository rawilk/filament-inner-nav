<?php

declare(strict_types=1);

namespace Rawilk\FilamentInnerNav;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class FilamentInnerNavServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-inner-nav')
            ->hasConfigFile()
            ->hasViews()
            ->hasViewComponents('filament-inner-nav')
            ->hasAssets();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register(
            assets: [
                Css::make('filament-inner-nav', __DIR__ . '/../resources/dist/app.css'),
            ],
            package: 'rawilk/filament-inner-nav',
        );
    }
}
