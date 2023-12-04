<?php

declare(strict_types=1);

namespace Rawilk\FilamentInnerNav;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class FilamentInnerNavServiceProvider extends PackageServiceProvider
{
    public const PACKAGE_ID = 'rawilk/filament-inner-nav';

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
                Css::make('filament-inner-nav', __DIR__ . '/../resources/dist/app.css')->loadedOnRequest(),
            ],
            package: self::PACKAGE_ID,
        );
    }
}
