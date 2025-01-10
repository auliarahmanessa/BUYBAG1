@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 pooorborder-gray-700 pooorbg-gray-900 pooortext-gray-300 focus:border-blue-500 pooorfocus:border-blue-600 focus:ring-blue-500 pooorfocus:ring-blue-600 rounded-md shadow-sm']) !!}>
