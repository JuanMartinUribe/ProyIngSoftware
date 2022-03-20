@extends('layouts.app')
@section('content')

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Video-Game-Controller-Icon-IDV-green.svg/2048px-Video-Game-Controller-Icon-IDV-green.svg.png"
        width="125" 
        height="100">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           Article Name: {{ $viewData["article"]->getName() }} <br> 
           Article Published Date: {{ $viewData["article"]->getCreatedAt() }}
        </h5>
        <p class="card-text"><b> Decription </b> <br> {{ $viewData["article"]->getDescription() }}</p>
      </div>
    </div>
  </div>
</div>


@endsection