@props([
    'group',
    'isSubNav' => false,
    'wireNavigate' => false,
])

@php
    /** @var \Rawilk\FilamentInnerNav\InnerNavGroup $group */
    $icon = $group->getIcon();
    $dropdownPlacement = $isSubNav ? 'right-start' : 'bottom-end';
@endphp

<x-filament::dropdown class="fi-inner-nav-dropdown" :placement="$dropdownPlacement">
    <x-slot:trigger>
        <button
            type="button"
            @class([
                'fi-inner-nav-top-item-group',
                'relative font-medium text-sm flex items-center justify-center gap-x-3 px-3 py-2',
                'hover:bg-gray-100 dark:hover:bg-white/5 dark:focus:bg-white/5 focus:ring-2 focus:ring-primary-600 dark:focus:ring-primary-400',
                'focus:text-primary-600 dark:focus:text-primary-400',
                'w-full text-left' => $isSubNav,
                'rounded-md w-full sm:w-auto text-center sm:text-left' => ! $isSubNav,
            ])
            id="{{ $group->getId() }}"
        >
            @if (filled($icon))
                <x-filament::icon
                    :icon="$icon"
                    class="fi-inner-nav-item-icon h-6 w-6 text-gray-400 dark:text-gray-500"
                />
            @endif

            <span class="flex-1 truncate">{{ $group->getLabel() }}</span>

            <span>
                <x-filament::icon
                    :icon="$isSubNav ? 'heroicon-m-chevron-right' : 'heroicon-m-chevron-down'"
                    class="fi-inner-nav-item-button-chevron h-5 w-5 text-gray-700 dark:text-gray-200"
                />
            </span>
        </button>
    </x-slot:trigger>

    <ul role="list"
        aria-labelledby="{{ $group->getId() }}"
        class="font-inter space-y-1 py-1"
    >
        @foreach ($group->getItems() as $item)
            <li>
                @if ($item instanceof \Rawilk\FilamentInnerNav\InnerNavGroup)
                    <x-filament-inner-nav::top-group-item
                        :group="$item"
                        :wire-navigate="$wireNavigate"
                        is-sub-nav
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
                        :disabled="$item->getIsDisabled()"
                        :wire-navigate="$wireNavigate"
                        grouped
                    >
                        {{ $item->getLabel() }}
                    </x-filament-inner-nav::top-item>
                @endif
            </li>
        @endforeach
    </ul>
</x-filament::dropdown>
