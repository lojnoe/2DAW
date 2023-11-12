<nav {{
    $attributes->merge([
        'class' => 'py-4 px-6 bg-while flex flex-col sm:flex-row text-center sm:text-left sm:justify-between shadow w-full gap-4 items-center'
    ])
}}>
    <a href="/"class="text-2xl text-gray-800 hover:text-gray-900">Home</a>
    <ul class="flex gap-2 flex-col sm:flex-row">
        {{ $slot }}
    </ul>
</nav>