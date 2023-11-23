@extends('app')

@section('title', $title)
@section('description', $description)

@section('content')
    @foreach($threads as $thread)

        @include('_item')
        
    @endforeach

    {{ $threads->links()}}
@endsection