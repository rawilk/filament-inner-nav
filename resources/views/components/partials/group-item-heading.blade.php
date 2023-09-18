@props([
    'group',
])

@php
    /** @var \Rawilk\FilamentInnerNav\InnerNavGroup $group */
@endphp

<div class="fi-inner-nav-group-heading">
    <div class="mt-4 pt-4 border-t border-gray-300 dark:border-gray-500">
        <h3 id="{{ $group->getId() }}"
            class="text-xs font-semibold text-gray-700 dark:text-gray-200 px-2"
        >
            {{ $group->getLabel() }}
        </h3>
    </div>
</div>
