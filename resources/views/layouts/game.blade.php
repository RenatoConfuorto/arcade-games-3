@extends('layouts.app')

@section('style')
    @yield('style')
@endsection

@section('title')
    @yield('title')
@endsection

@section('content')
    <div class="board">
      <div class="game-area">
        <div id="grid"></div>
      </div>
      <div class="game-data">
        @yield('game-data')
      </div>
    </div>
@endsection

@push('script')
    @yield('script')
@endpush