@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('content')

<body style="background-color:#8d95dd;">
<div align = "center">
  <div class="card text-white" style="width: 18rem; background-color:#561370;">
    <img class="card-img-top" src="https://www.hp.com/us-en/shop/app/assets/images/uploads/prod/best-free-pc-games-available-now-hero1537482575021.jpg" alt="Card image cap">
    <div class="card-tittle text-center">
      <h5>
        @lang('Gamestore')
      </h5>
    </div>
    <div class="card-body">
      <p class="card-text">@lang('Sell home')</p>
    </div>
  </div>
</div>
<div class = "row">
  <div class="col-md-9">
    <div class="card text-white" style="width: 18rem; background-color:#561370;">
      <img class="card-img-top" src="https://miro.medium.com/max/1200/1*UAGU532MbhR5cm3symwWqg.png" alt="Card image cap">
      <div class="card-tittle text-center">
        <h5>
          @lang('Statistics')
        </h5>
      </div>
      <div class="card-body">
        <p class="card-text">@lang('Statistics home')</p>
      </div>
    </div>
  </div>
  <div class="col-sm-1">
    <div class="card text-white" style="width: 18rem; background-color:#561370;">
      <img class="card-img-top" src="https://cpb-us-w2.wpmucdn.com/voices.uchicago.edu/dist/8/90/files/2019/11/feedback-smallcanvas-1080x675.png" alt="Card image cap">
      <div class="card-tittle text-center">
        <h5>
          @lang('Discussions')
        </h5>
      </div>
      <div class="card-body">
        <p class="card-text">@lang('Articles home')</p>
      </div>
    </div>
  </div>
</div>
</body>
@endsection