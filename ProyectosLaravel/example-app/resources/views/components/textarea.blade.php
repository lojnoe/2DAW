<textarea 
    rows="3" {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}>
    
</textarea>
