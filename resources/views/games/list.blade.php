@extends('layouts.app')

@section('title')
    Arcade Mania - Tris
@endsection

@section('content')
  <div class="container versions-list">
    <ul class="list-items">
      @foreach ($game_versions as $version)
        <li class="flex-inline-cd">
          <a href="#">{{ $version['text'] }}</a>
          <div class="info">
            <span class="info-btn" data-key="{{ $version['game_key'] }}">?</span>
            <div class="game-info {{ $version['game_key'] }} d-none" data-key="{{ $version['game_key'] }}"">
            </div>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
@endsection

@push('script')
<script type="module">
  
import { getGameInfoMobile, changeInfoBannerVisibility } from '/js/common.js';

const btns = document.querySelectorAll('span.info-btn');

btns.forEach( btn => {
  // console.log(btn);
  const key = btn.dataset.key;
  
  getGameInfoMobile(key);
  btn.addEventListener('click', changeInfoBannerVisibility);


});
</script>
@endpush