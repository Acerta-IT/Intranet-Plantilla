@props(['type' => 'primary', 'label', 'text' => 'white', 'hover' => '{{ $type }}4'])

<a
    {{ $attributes->merge(['class' => "px-4 py-3 mt-4 2xl:mt-0 text-center inline-flex float-end 2xl:flex items-center bg-{$type} text-{$text} border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-{$type}4 hover:text-white  focus:outline-none focus:ring-2 focus:ring-{$type} focus:ring-offset-2 transition ease-in-out duration-150"]) }}>
    {{ $label }}
</a>
