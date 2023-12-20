@extends('app')

@section('content')
<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <input 
        type="text"
        name="name"
        value="{{ $product->name }}"
        class="w-full py-2 border border-gray-300 rounded mb-4"
    >
    <input 
        type="submit" 
        value="Actualizar" 
        class="w-full bg-blue-600 rounded text-white px-4 py-2"
    >
</form>
@endsection