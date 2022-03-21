@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["games"] as $game)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="http://d3ugyf2ht6aenh.cloudfront.net/stores/474/538/themes/common/logo-423068398-1643755563-fecd68ef5d3917e3cd76a94eee3b2f411643755563.png?0" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('game.show', ['id'=> $game->getId()]) }}"
          class="btn bg-primary text-white">{{ $game->getName() }}</a> <br>
          Price: {{ $game->getPrice() }} 
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection