@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-blue-400 pooorborder-blueP-600 text-left text-base font-medium text-blue-700 pooortext-blue-300 bg-blue-50 pooorbg-blue-900/50 focus:outline-none focus:text-blue-800 pooorfocus:text-blue-200 focus:bg-blue-100 pooorfocus:bg-blue-900 focus:border-blue-700 pooorfocus:border-blue-300 transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-600 pooortext-gray-400 hover:text-gray-800 pooorhover:text-gray-200 hover:bg-gray-50 pooorhover:bg-gray-700 hover:border-gray-300 pooorhover:border-gray-600 focus:outline-none focus:text-gray-800 pooorfocus:text-gray-200 focus:bg-gray-50 pooorfocus:bg-gray-700 focus:border-gray-300 pooorfocus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
