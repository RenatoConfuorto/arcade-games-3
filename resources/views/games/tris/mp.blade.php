@extends('layouts.game')

@section('title', 'Tris MP - Arcade Mania')

@section('style')
  <link rel="stylesheet" href="{{ asset('css/tris.css') }}">
@endsection


@section('game-data')
@endsection

@push('script')
    <script type="module" src="{{ asset('js/tris/tris_mp.js') }}"></script>
@endpush