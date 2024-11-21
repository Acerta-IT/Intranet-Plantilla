@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'text-neutral4 px-4 py-2 rounded-md drop-shadow-md w-full bg-white flex gap-2 items-center border-l-6 border-brand'
            : 'text-neutral2 px-4 py-2 hover:bg-acertaLightGray flex gap-2 items-center border-l-6 border-secondary';
@endphp

<div class="p-2">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        <span class="material-symbols-outlined text-xl">
            {{ $icon ?? '' }}
        </span>
        {{ $slot }}
    </a>
</div>
