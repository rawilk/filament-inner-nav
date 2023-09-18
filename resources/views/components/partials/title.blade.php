@props([
    'title' => null,
    'description' => null,
])

@if (filled($title) || filled($description))
    <div {{ $attributes->class('flex items-center rtl:space-x-reverse') }}>
        <div class="w-full">
            @if (filled($title))
                @unless ($title instanceof \Illuminate\Support\HtmlString)
                    <h3 class="fi-inner-nav-title text-base font-medium text-gray-700 dark:text-white truncate block">
                        {{ $title }}
                    </h3>
                @else
                    {{ $title }}
                @endunless
            @endif

            @if (filled($description))
                <p class="fi-inner-nav-description text-xs text-gray-500 dark:text-gray-200">
                    {{ $description }}
                </p>
            @endif
        </div>
    </div>
@endif
