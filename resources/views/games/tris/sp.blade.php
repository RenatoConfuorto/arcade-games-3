@extends('layouts.game')

@section('title', 'Tris SP - Arcade Mania')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/tris.css') }}">
@endsection

@section('game-data')
@endsection

@section('script')
    <script type="module" src="{{ asset('js/tris/tris_sp.js') }}"></script>
@endsection