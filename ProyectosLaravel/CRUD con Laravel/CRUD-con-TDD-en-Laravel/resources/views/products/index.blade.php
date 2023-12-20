@extends('app')

@section('content')
<a href="{{ route('products.create') }}" class="bg-blue-600 rounded text-white p-2">
    Crear
</a>
<hr class="my-8">
<table class="w-full mb-4">
    <tbody>
        @forelse ($products as $product)
            <tr>
                <td class="p-2">{{ $product->name }}</td>
                <td class="p-2"><a href="{{ route('products.show', $product) }}" class="text-blue-600">Ver</a></td>
                <td class="p-2"><a href="{{ route('products.edit', $product) }}" class="text-blue-600">Editar</a></td>
                <td class="p-2">
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar" class="bg-red-600 rounded text-white p-2 text-xs">
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td class="p-2">
                    No hay productos registrados
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $products->links() }}
@endsection