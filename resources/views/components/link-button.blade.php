@props(['type' => 'primary', 'label', 'text' => 'white', 'hover' => 'neutral4'])

<a {{ $attributes->merge(['class' => "px-4 py-2 flex items-center bg-{$type} text-" . ($text ? $text : 'red') . " border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-{$type}4 hover:text-red-500 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-{$type} focus:ring-offset-2 transition ease-in-out duration-150"]) }}>
    {{ $label }}
</a>
