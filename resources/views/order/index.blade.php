@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://i.pinimg.com/originals/72/3d/0a/723d0af616b1fe7d5c7e56a3532be3cd.png" class="img-fluid rounded-start"
        width="200" 
        height="400"><br>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
        </h5>
        @foreach($viewData["orders"] as $order)
            Order ID: {{$order->getId()}}<br>
            Total Price: {{$order->getTotal()}}<br>
            @foreach($order->getItems() as $item)   
                {{$item->getGame()->getName()}} Price:
                {{$item->getGame()->getPrice()}}<br>
            @endforeach
            <br>
        @endforeach
      </div>
    </div>
    <a href="{{ route('cart.index') }}">Back To Cart</a>
  </div>
</div>
@endsection