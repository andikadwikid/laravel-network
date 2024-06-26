<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center px-4 py-2 bg-blue-600 border
                        border-transparent rounded-xl text-sm text-white capitalize tracking-widest hover:bg-blue-700
                        active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition
                        ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
