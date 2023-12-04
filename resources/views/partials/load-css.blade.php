@php
    use Filament\Support\Facades\FilamentAsset;
    use Rawilk\FilamentInnerNav\FilamentInnerNavServiceProvider;

    $css = FilamentAsset::getStyleHref('filament-inner-nav', package: FilamentInnerNavServiceProvider::PACKAGE_ID);
@endphp

data-dispatch="inner-nav-loaded"
x-data
x-load-css="[@js($css)]"
x-on:inner-nav-loaded-css.window.once="() => {
    if (window.__innerNavStylesLoaded === true) { return }
    const style = document.head.querySelector('link[href=\'{{ $css }}\']');
    style && style.remove();
    style && document.head.prepend(style);
    window.__innerNavStylesLoaded = true;
}"
