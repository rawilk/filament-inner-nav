@props([
    'group',
    'wireNavigate' => false,
])

@php
    /** @var \Rawilk\FilamentInnerNav\InnerNavGroup $group */
    $isCollapsible = $group->isCollapsible();
    $isActive = $group->isActive();
@endphp

<li @class([
    'fi-inner-nav-item-group',
    'fi-inner-nav-item-group--collapsible' => $isCollapsible,
])>
    <div
        @if ($isCollapsible)
            x-data="{ expanded: {{ \Illuminate\Support\Js::from($isActive || $group->isExpanded()) }} }"
            wire:ignore.self
        @endif
    >
        @if ($isCollapsible)
            <x-filament-inner-nav::partials.group-item-button
                :group="$group"
            />
        @else
            <x-filament-inner-nav::partials.group-item-heading
                :group="$group"
            />
        @endif

        <ul role="list"
            aria-labelledby="{{ $group->getId() }}"
            @if ($isCollapsible)
                x-show="expanded"
            @else
                id="{{ $group->getSubNavId() }}"
            @endif
            @class([
                'font-inter font-medium',
                'pt-1' => $isCollapsible,
                'space-y-2 pt-3' => ! $isCollapsible,
            ])
        >
            @foreach ($group->getItems() as $item)
                @if ($item instanceof \Rawilk\FilamentInnerNav\InnerNavGroup)
                    <x-filament-inner-nav::group-item
                        :group="$item"
                        :wire-navigate="$wireNavigate"
                    />
                @else
                    <x-filament-inner-nav::item
                        :active="$item->isActive()"
                        :icon="$isCollapsible ? null : $item->getIcon()"
                        :active-icon="$isCollapsible ? null : $item->getActiveIcon()"
                        :href="$item->getUrl()"
                        :badge="$item->getBadge()"
                        :badge-color="$item->getBadgeColor()"
                        :should-open-url-in-new-tab="$item->shouldOpenUrlInNewTab()"
                        :grouped="$isCollapsible"
                        :wire-navigate="$wireNavigate"
                        :disabled="$item->getIsDisabled()"
                    >
                        {{ $item->getLabel() }}
                    </x-filament-inner-nav::item>
                @endif
            @endforeach
        </ul>
    </div>
</li>
