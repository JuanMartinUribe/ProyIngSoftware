@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h1>@lang('Available games')</h1>
      <ul>
        @foreach($viewData["games"] as $key => $game)
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">
                @lang('Name'): {{ $game->getName() }}
              </h5>
              <h6 class="card-subtitle mb-2 text-muted">
                @lang('Genre'): {{ $game->getGenre() }}
              </h6>
              <p class="card-text">
                @lang('Description'): {{ $game->getDescription() }}
              </p>
                @lang('Price'): {{ $game->getPrice() }} <br>
                <center>
                  <a class="btn bg-primary text-white" href="{{ route('cart.add', ['id'=> $game->getId() ]) }}">@lang('Add to cart')</a>
                </center>
              </li>
            </div>
          </div>
        @endforeach
        </ul>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h1>@lang('Games in cart')</h1>
      <ul>
        @foreach($viewData["gamesInCart"] as $key => $game)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">
                @lang('Name'): {{ $game->getName() }}
              </h5>
              <h6 class="card-subtitle mb-2 text-muted">
                @lang('Genre'): {{ $game->getGenre() }}
              </h6>
              <p class="card-text">
                @lang('Description'): {{ $game->getDescription() }}
              </p>
                @lang('Price'): {{ $game->getPrice() }} <br>
            </div>
        </div>
        @endforeach
      </ul>
      <ul>
        <a class="btn bg-primary text-white" href="{{ route('cart.purchase') }}">@lang('Buy')</a><br>
        <br>
        <a class="btn bg-primary text-white" href="{{ route('cart.removeAll') }}">@lang('Remove all products from cart')</a>
      </ul>
    </div>
  </div>
</div>
@endsection