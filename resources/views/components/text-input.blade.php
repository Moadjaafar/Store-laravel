@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-gray-500 focus:ring-black-500 rounded-md shadow-sm']) !!}>
