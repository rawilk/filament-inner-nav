@php
    /** @var \Rawilk\FilamentInnerNav\InnerNav $innerNav */

    $navTitle = $innerNav->getTitle();
    $navDescription = $innerNav->getDescription();
    $shouldWireNavigate = $innerNav->shouldWireNavigate();

    $grid = config('filament-inner-nav.grid', [
        'sm' => '12',
        'md' => '3',
        'lg' => '3',
        'xl' => '3',
        '2xl' => '3',
    ]);

    $navClasses = \Illuminate\Support\Arr::toCssClasses([
        'col-[--col-span-default]',
        'sm:col-[--col-span-sm]',
        'md:col-[--col-span-md]',
        'lg:col-[--col-span-lg]',
        'xl:col-[--col-span-xl]',
        '2xl:col-[--col-span-2xl]',
        'rounded',
    ]);

    $navStyles = \Illuminate\Support\Arr::toCssStyles([
        '--col-span-default: span 12',
        '--col-span-sm: span ' . ($grid['sm'] ?? 12),
        '--col-span-md: span ' . ($grid['md'] ?? 3),
        '--col-span-lg: span ' . ($grid['lg'] ?? 3),
        '--col-span-xl: span ' . ($grid['xl'] ?? 3),
        '--col-span-2xl: span ' . ($grid['2xl'] ?? 3),
    ]);

    $contentClasses = \Illuminate\Support\Arr::toCssClasses([
        'fi-inner-nav-content',
        'col-[--col-span-default]',
        'sm:col-[--col-span-sm]',
        'md:col-[--col-span-md]',
        'lg:col-[--col-span-lg]',
        'xl:col-[--col-span-xl]',
        '2xl:col-[--col-span-2xl]',
    ]);

    $contentStyles = \Illuminate\Support\Arr::toCssStyles([
        '--col-span-default: span 12',
        '--col-span-sm: span ' . (12 - ($grid['sm'] ?? 12)),
        '--col-span-md: span ' . (12 - ($grid['md'] ?? 3)),
        '--col-span-lg: span ' . (12 - ($grid['lg'] ?? 3)),
        '--col-span-xl: span ' . (12 - ($grid['xl'] ?? 3)),
        '--col-span-2xl: span ' . (12 - ($grid['2xl'] ?? 3)),
    ]);
@endphp

<div
    class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6"
    @include('filament-inner-nav::partials.load-css')
>
    <div class="{{ $navClasses }}" style="{{ $navStyles }}">
        {{-- title/description --}}
        <x-filament-inner-nav::partials.title
            :title="$navTitle"
            :description="$navDescription"
        />

        {{-- nav links --}}
        <ul @class([
            'space-y-2 font-inter font-medium',
            'mt-4' => filled($navTitle) || filled($navDescription),
        ])>
            @foreach ($innerNav->getNavigationItems() as $item)
                @if ($item instanceof \Rawilk\FilamentInnerNav\InnerNavGroup)
                    <x-filament-inner-nav::group-item
                        :group="$item"
                        :wire-navigate="$shouldWireNavigate"
                    >
                        {{ $item->getLabel() }}
                    </x-filament-inner-nav::group-item>
                @else
                    <x-filament-inner-nav::item
                        :active="$item->isActive()"
                        :icon="$item->getIcon()"
                        :active-icon="$item->getActiveIcon()"
                        :href="$item->getUrl()"
                        :badge="$item->getBadge()"
                        :badge-color="$item->getBadgeColor()"
                        :should-open-url-in-new-tab="$item->shouldOpenUrlInNewTab()"
                        :wire-navigate="$shouldWireNavigate"
                        :disabled="$item->getIsDisabled()"
                    >
                        {{ $item->getLabel() }}
                    </x-filament-inner-nav::item>
                @endif
            @endforeach
        </ul>
    </div>

    {{-- content --}}
    <div class="{{ $contentClasses }}" style="{{ $contentStyles }}">
        {{ $slot }}
    </div>
</div>
