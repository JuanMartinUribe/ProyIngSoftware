@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <center>
            <h1>
            @if(Auth::user())
              @lang('Your balance'): {{Auth::user()->getBalance()}}
            @endif  
            </h1>
      </center>
      <br>
      <h1>@lang('Games in cart')</h1>
      <ul>
        @foreach($viewData["gamesInCart"] as $key => $game)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">
                @lang('Name'): {{ $game->getName() }}
              </h5>
              <img class="image rounded" src="{{asset('/uploads/games/'.$game->getImage() )}}" alt="image" style="align:center width: 100px;height: 100px; padding: 5px; margin: 0px; ">
              <h6 class="card-subtitle mb-2 text-muted">
                @lang('Genre'): {{ $game->getGenre() }}
              </h6>
              <p class="card-text">
                @lang('Description'): {{ $game->getDescription() }}
              </p>
                @lang('Price'): {{ $game->getPrice() }} @lang('USD') <br>
            </div>
        </div>
        @endforeach
      </ul>
      <ul>
        @if(Auth::user())
          <a class="btn bg-primary text-white" href="{{ route('cart.purchase') }}">@lang('Buy')</a><br>
        @endif
        <br>
        <a class="btn bg-primary text-white" href="{{ route('cart.removeAll') }}">@lang('Remove all products from cart')</a>
      </ul>
    </div>
  </div>
</div>
@endsection