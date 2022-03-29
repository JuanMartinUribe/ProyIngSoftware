@extends('layouts.admin')
@section('content')

<div class="row">
  @foreach ($viewData["games"] as $game)
  
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
    <img class="image rounded" src="{{asset('/uploads/games/'.$game->getImage() )}}" alt="image" style="align:center width: 320px;height: 320px; padding: 10px; margin: 0px; ">
      <div class="card-body text-center">
            {{$game->getId() }} <br>
            {{$game->getName() }} <br>
            {{$game->getDescription() }} <br>
            <form method="post" action="{{ route('game.delete',['id'=> $game->getId()])}}" >
              @csrf
              <input type="submit" value="Delete game" />
            </form>
            <a href="{{ route('game.edit',['id'=> $game->getId()]) }} ">Update</a>                  
      </div>    
    </div>
  </div>
  @endforeach
</div>

@endsection