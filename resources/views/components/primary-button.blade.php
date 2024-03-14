<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center 
    px-4 py-2  border border-transparent rounded-md font-semibold text-xs 
    uppercase tracking-widest hover:bg-violet-700 focus:bg-violet-700 active:bg-violet-900 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 transition ease-in-out duration-150 bg-violet-800',
    ]) }}>
    {{ $slot }}
</button>
