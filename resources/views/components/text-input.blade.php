@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-0 dark:border-gray-700
dark:bg-gray-200 dark:text-black focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>