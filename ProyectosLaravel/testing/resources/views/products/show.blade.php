@extends('app')

@section('content')
<h3 class="text-xl">{{ $product->name }}</h3>

<a href="{{ route('products.index') }}" class="text-blue-600">Volver</a>
@endsection