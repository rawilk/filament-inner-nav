@props([
    'innerNav' => null,
])

@php
    /** @var \Rawilk\FilamentInnerNav\InnerNav $innerNav */
    $innerNav = $innerNav ?? static::getResource()::innerNav($this->record ?? null, $this);

    $isTopLayout = $innerNav->isLayout(\Rawilk\FilamentInnerNav\Enums\InnerNavLayout::Top);
@endphp

<div @class([
        'fi-inner-nav-wrapper',
        'fi-inner-nav-wrapper--top' => $isTopLayout,
    ])
>
    @includeWhen($isTopLayout, 'filament-inner-nav::layouts.layout-top')
    @includeWhen(! $isTopLayout, 'filament-inner-nav::layouts.layout-side')
</div>
