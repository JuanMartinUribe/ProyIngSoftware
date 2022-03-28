@extends('layouts.admin')
@section('content')

<div class="row">
  @foreach ($viewData["games"] as $game)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="http://d3ugyf2ht6aenh.cloudfront.net/stores/474/538/themes/common/logo-423068398-1643755563-fecd68ef5d3917e3cd76a94eee3b2f411643755563.png?0" class="card-img-top img-card">
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