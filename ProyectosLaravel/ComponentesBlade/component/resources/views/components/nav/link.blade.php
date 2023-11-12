<li>
    <a {{
        $attributes->merge([
                'class' => 'text-sm text-gray-800 hover:text-gray-900'
            ])
    }}>
    {{ $slot }}
</a>

</li>