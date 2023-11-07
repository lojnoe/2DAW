@extends('template')

@section('title','Registro')
@section('content')
<x-wrapper>
    <x-slot name="title">Registrar</x-slot>
      <form action="">
            <div>
                <x-label>Email</x-label>
                <input type="text" name="email" class="rounded shadow border border-gray-300 p-2 mt-1 w-full outline-none">
            </div>
            <div class="mt-4">
                <x-label>Nombre</x-label>
                <input type="text" name="name" class="rounded shadow border border-gray-300 p-2 mt-1 w-full outline-none">
            </div>
            <div class="mt-4">
                <x-label>Contraseña</x-label>
                <input type="password" name="password" class="rounded shadow border border-gray-300 p-2 mt-1 w-full outline-none">
            </div>
            <div class="flex items-center gap-4 justify-end mt-8">
                <a href="/login" class="underline text-sm text-gray-600 hover:text-gray-900">Estoy Registrado</a>
                <button type="submit" class="px-4 py-2 bg-blue-800 rounded text-xs text-white uppercase hover:bg-blue-700">
                    Registrarse
                </button>
            </div>
        </form>
</x-wrapper>
@endsection