@extends('layouts.admin')
@section('content')

<div class="row">
  @foreach ($viewData["games"] as $game)
  
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
    <img class="image rounded-circle" src="{{asset('/uploads/games/'.$game->getImage() )}}" alt="image" style="width: 160px;height: 160px; padding: 10px; margin: 0px; ">
      <div class="card-body text-center">
            {{$game->getId() }} <br>
            {{$game->getName() }} <br>
            {{$game->getDescription() }} <br>
            <form method="post" action="{{ route('game.delete',['id'=> $game->getId()])}}" >
              @csrf
              <input type="submit" value="Delete game" />
            </form>           
      </div>    
    </div>
  </div>
  @endforeach
</div>

@endsection