@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="img-container">
            <img src="{{ asset('resources/images/thumbs.png') }}" alt="Thumbs">
            <img src="{{ asset('resources/images/logo.png') }}" alt="Thumbs">
        </div>
        <ul>
            @foreach ($routes as $route)
                <li><a href="{{ route($route['name']) }}">{{ $route['text'] }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection