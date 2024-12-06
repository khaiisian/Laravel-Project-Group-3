<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-black dark:bg-black
    border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest
    hover:bg-gray-700 dark:hover:bg-700-00 focus:bg-gray-700 dark:focus:bg-gray-700 active:bg-gray-900
    dark:active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
    dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>