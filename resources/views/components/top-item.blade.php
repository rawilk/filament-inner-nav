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

<a
    @unless ($disabled)
        href="{{ $href }}"
        @if ($shouldOpenUrlInNewTab)
            target="_blank"
            rel="nofollow noopener"
        @elseif ($wireNavigate)
            wire:navigate
        @endif
    @endif
    @class([
        'fi-inner-nav-item-top-link',
        'relative group px-3 py-2 text-sm font-medium',
        'flex items-center justify-center whitespace-nowrap',
        'bg-gray-100 text-primary-600 dark:bg-white/5 dark:text-primary-400' => $active && ! $disabled,
        'hover:bg-gray-100 dark:hover:bg-white/5' => ! $active && ! $disabled,
        'dark:focus:bg-white/5 focus:ring-2 focus:ring-primary-600 dark:focus:ring-primary-400' => ! $disabled,
        'fi-inner-nav-item-top-link--disabled cursor-not-allowed opacity-50' => $disabled,
        'justify-center rounded-md' => ! $grouped,
        'justify-between' => $grouped,
    ])
    @if ($active)
        aria-current="page"
    @endif
>
    <span class="flex items-center">
        @if (filled($icon))
            <x-filament::icon
                :icon="($active && $activeIcon) ? $activeIcon : $icon"
                @class([
                    'fi-inner-nav-item-icon h-6 w-6 mr-2',
                    'text-gray-400 dark:text-gray-500 group-hover:text-primary-600 dark:group-hover:text-primary-400' => ! $active,
                    'text-primary-600 dark:text-primary-400' => $active,
                ])
            />
        @endif

        <span>{{ $slot }}</span>
    </span>

    @if (filled($badge))
        <span class="ml-3">
            <x-filament::badge :color="$badgeColor">
                {{ $badge }}
            </x-filament::badge>
        </span>
    @endif
</a>
