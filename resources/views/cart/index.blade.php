@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>Available games</h1>
    <ul>
      @foreach($viewData["games"] as $key => $game)
        <li>
          Id: {{  $game->getId() }} - 
          Name: {{ $game->getName() }} -
          Price: {{ $game->getPrice() }} -
          <a href="{{ route('cart.add', ['id'=> $game->getId() ]) }}">Add to cart</a>
        </li>
      @endforeach
      </ul>
    </div>
  </div>

  <a href="{{ route('cart.purchase') }}">Buy</a>

  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>games in cart</h1>
      <ul>
        @foreach($viewData["gamesInCart"] as $key => $game)
          <li>
            Id: {{  $game->getId() }} - 
            Name: {{ $game->getName() }} -
            Price: {{ $game->getPrice() }}
          </li>
        @endforeach
      </ul>
      <a href="{{ route('cart.removeAll') }}">Remove all products from cart</a>
      
    </div>
  </div>
</div>
@endsection