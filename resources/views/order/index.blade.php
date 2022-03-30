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
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Order ID: {{$order->getId()}}<br>
              </h5>
              <p class="card-text">  
              @lang('Total price'): {{$order->getTotal()}} @lang('USD')<br>
              @foreach($order->getItems() as $item)   
                {{$item->getGame()->getName()}} @lang('Price'):
                {{$item->getGame()->getPrice()}} @lang('USD')<br>
                @lang('Quantity') : {{$item->getQuantity()}} <br>
              @endforeach
              </p>
            </div>
          </div>
            <br>
        @endforeach
      </div>
    </div>
    <a class="btn bg-primary text-white" href="{{ route('cart.index') }}">@lang('Back to cart')</a>
  </div>
</div>
@endsection