@extends('layouts.app')

@section('title')
    Arcade Mania
@endsection

@section('content')
    <div class="container">
        <div class="img-container">
            <img src="{{ asset('resources/images/thumbs.png') }}" alt="Thumbs">
            <img src="{{ asset('resources/images/logo.png') }}" alt="Thumbs">
        </div>
        <ul class="list-items">
            @foreach ($games as $game)
                <li><a href="{{ route('games.versions', ['name' => $game['name']]) }}">{{ $game['name'] }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection