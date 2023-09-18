@props([
    'active' => false,
    'activeIcon' => false,
    'badge' => null,
    'badgeColor' => null,
    'grouped' => false,
    'icon' => null,
    'shouldOpenUrlInNewTab' => false,
    'disabled' => false,
    'wireNavigate' => false,
    'href' => '#',
])

<li @class([
    'fi-inner-nav-item',
    'fi-inner-nav-item--active' => $active,
    'fi-inner-nav-group-item' => $grouped,
])>
    <a
        @unless ($disabled)
            href="{{ $href }}"
            @if ($shouldOpenUrlInNewTab)
                target="_blank"
                rel="nofollow noopener"
            @elseif ($wireNavigate)
                wire:navigate
            @endif
        @endunless
        @class([
            'fi-inner-nav-item-link',
            'relative flex items-center justify-center gap-x-3 rounded-lg px-2 text-gray-700 outline-none transition duration-75 dark:text-gray-200',
            'bg-gray-100 text-primary-600 dark:bg-white/5 dark:text-primary-400' => $active,
            'text-sm py-2' => ! $grouped,
            'text-xs py-1' => $grouped,
            'hover:bg-gray-100 dark:hover:bg-white/5' => ! $active && ! $disabled,
            'dark:focus:bg-white/5 focus:ring-2 focus:ring-primary-600 dark:focus:ring-primary-400' => ! $disabled,
            'fi-inner-nav-item-link--disabled cursor-not-allowed opacity-50' => $disabled,
        ])
        @if ($active)
            aria-current="page"
        @endif
    >
        @if (filled($icon))
            <x-filament::icon
                :icon="($active && $activeIcon) ? $activeIcon : $icon"
                @class([
                    'fi-inner-nav-item-icon h-6 w-6',
                    'text-gray-400 dark:text-gray-500' => ! $active,
                    'text-primary-600 dark:text-primary-400' => $active,
                ])
            />
        @elseif ($grouped)
            <div role="presentation"
                 class="h-6 w-6"
            >
            </div>
        @endif

        <span
            @if (filament()->isSidebarCollapsibleOnDesktop())
                x-show="true"
                x-transition:enter="lg:transition lg:delay-100"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
            @endif
            class="flex-1 truncate"
        >
            {{ $slot }}
        </span>

        @if (filled($badge))
            <span
                @if (filament()->isSidebarCollapsibleOnDesktop())
                    x-show="true"
                    x-transition:enter="lg:transition lg:delay-100"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                @endif
            >
                <x-filament::badge :color="$badgeColor">
                    {{ $badge }}
                </x-filament::badge>
            </span>
        @endif
    </a>
</li>
