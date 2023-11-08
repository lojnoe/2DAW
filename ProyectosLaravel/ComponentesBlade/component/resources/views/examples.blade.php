@extends('template')


@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl">Listad de ejemplos</h1>

        <hr class="my-4">

        <x-flash> Mensaje de OK </x-flash>
        <x-flash type="error"> Mensaje de flash </x-flash>
        <x-flash type="info"> Mensaje de flash </x-flash>
        <x-flash type="warning"> Mensaje de flash </x-flash>
    </div>
@endsection