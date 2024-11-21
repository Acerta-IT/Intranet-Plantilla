@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'text-neutral4 px-4 py-2 rounded-md drop-shadow-md w-full bg-white flex gap-2 items-center border-l-6 border-brand'
            : 'text-neutral2 px-4 py-2 rounded-md  flex gap-2 items-center  border-l-6 border-secondary hover:border-white hover:bg-white hover:border-neutral1 hover:text-neutral hover:drop-shadow-md';
@endphp

<div class="p-1">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        <span class="material-symbols-outlined text-xl">
            {{ $icon ?? '' }}
        </span>
        {{ $slot }}
    </a>
</div>
