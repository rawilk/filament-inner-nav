@props([
    'group',
])

@php
    /** @var \Rawilk\FilamentInnerNav\InnerNavGroup $group */
    $icon = $group->getIcon();
@endphp

<button
    type="button"
    id="{{ $group->getId() }}"
    x-bind:aria-expanded="expanded"
    class="fi-inner-nav-item-button relative w-full flex items-center justify-center text-left gap-x-3 rounded-lg px-2 py-2 text-sm text-gray-700 outline-none transition duration-75 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/5 focus:ring-2 focus:ring-primary-600 dark:focus:ring-primary-400"
    x-bind:class="{ 'bg-gray-100 text-primary-600 dark:bg-white/5 dark:text-primary-400': expanded }"
    x-on:click="expanded = ! expanded"
    x-on:keydown.arrow-down="expanded = true"
    x-on:keydown.arrow-up="expanded = false"
>
    @if (filled($icon))
        <x-filament::icon
            :icon="$icon"
            class="fi-inner-nav-item-icon h-6 w-6"
            x-bind:class="{ 'text-gray-400 dark:text-gray-500': ! expanded, 'text-primary-600 dark:text-primary-400': expanded }"
        />
    @endif

    <span class="flex-1 truncate">
        {{ $group->getLabel() }}
    </span>

    <span>
        <x-filament::icon
            icon="heroicon-m-chevron-down"
            class="fi-inner-nav-item-button-chevron h-5 w-5 text-gray-700 dark:text-gray-200"
            x-bind:class="{ 'rotate-180': expanded }"
        />
    </span>
</button>
