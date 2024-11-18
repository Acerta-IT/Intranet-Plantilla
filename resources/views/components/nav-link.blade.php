@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'text-white px-4 py-3 w-full bg-acertaLightGray flex gap-2 items-center'
            : 'text-gray-200  px-4 py-3 hover:bg-acertaLightGray flex gap-2 items-center';
@endphp



<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="material-symbols-outlined text-xl">
        {{ $icon ?? '' }}
    </span>
    {{ $slot }}
</a>
