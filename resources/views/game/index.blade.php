@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="row">
  @foreach ($viewData["games"] as $game)
  <a href="{{ route('fish.index')}}"> @lang("Hungry")</a>
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
    <img class="image rounded-center" src="{{asset('/uploads/games/'.$game->getImage() )}}" alt="image" style="align:center width: 320px;height: 320px; padding: 10px; margin: 0px; ">
      <div class="card-body text-center">
        <a href="{{ route('game.show', ['id'=> $game->getId()]) }}"
          class="btn bg-primary text-white">{{ $game->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection