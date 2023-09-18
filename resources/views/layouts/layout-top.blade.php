@php
    /** @var \Rawilk\FilamentInnerNav\InnerNav $innerNav */

    $navTitle = $innerNav->getTitle();
    $navDescription = $innerNav->getDescription();
    $shouldWireNavigate = $innerNav->shouldWireNavigate();
@endphp

<div>
    {{-- title/description --}}
    <x-filament-inner-nav::partials.title
        :title="$navTitle"
        :description="$navDescription"
        class="mb-4"
    />

    <div>
        <nav class="flex flex-col sm:flex-row gap-2 sm:flex-wrap -mx-3">
            @foreach ($innerNav->getNavigationItems() as $item)
                @unless ($item->isHidden())
                    @if ($item instanceof \Rawilk\FilamentInnerNav\InnerNavGroup)
                        <x-filament-inner-nav::top-group-item
                            :group="$item"
                            :wire-navigate="$shouldWireNavigate"
                        />
                    @else
                        <x-filament-inner-nav::top-item
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
                        </x-filament-inner-nav::top-item>
                    @endif
                @endunless
            @endforeach
        </nav>
    </div>

    <div class="mt-4">
        {{ $slot }}
    </div>
</div>
