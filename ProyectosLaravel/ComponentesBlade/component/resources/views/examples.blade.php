@extends('template')


@section('content')

<x-nav class="mb-4">
    <x-nav.link href="#">Cursos</x-nav.link>
    <x-nav.link href="#">Planes</x-nav.link>
    <x-nav.link href="#">Documentos</x-nav.link>


    <x-nav.link href="/login" class="rounded-full px-3 py-1 bg-gray-900 text-white hover:text-white">Login</x-nav.link>
    <x-nav.link href="/register" class="rounded-full px-3 py-1 border-2 border-gray-900 text-gray-900">Register</x-nav.link>
</x-nav>
    <div class="container mx-auto px-4">
        <h1 class="text-3xl">Listad de ejemplos</h1>

        <hr class="my-4">

        <x-flash> Mensaje de OK </x-flash>
        <x-flash type="error"> Mensaje de error</x-flash>
        <x-flash type="info"> Mensaje de informacion</x-flash>
        <x-flash type="warning"> Mensaje de advertencia</x-flash>
    </div>
@endsection