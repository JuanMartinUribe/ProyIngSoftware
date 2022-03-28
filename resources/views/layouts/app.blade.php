<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Online Game Store')</title>
</head>
<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home.index') }}"><img src="https://i.ibb.co/rsNfwLL/Logo.png" width="200" height="100"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{ route('game.index') }}">@lang('Games')</a>
          <a class="nav-link active" href="{{ route('cart.index') }}">@lang('Cart')</a>
          <a class="nav-link active" href="{{ route('order.index') }}">@lang('Orders')</a>     
          <a class="nav-link active" href="{{ route('game.showCheapGames') }}">@lang('Low price games')</a>
          <a class="nav-link active" href="{{ route('game.showTopSellers') }}">@lang('Best sellers')</a>
          <a class="nav-link active" href="{{ route('game.showRecentGames') }}">@lang('New releases')</a>
          <a class="nav-link active" href="{{ route('game.showMostPopular') }}">@lang('Trending game')</a>
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          <a class="nav-link active" href="{{ route('home.index') }}">@lang('Home')</a>
          <a class="nav-link active" href="{{ route('home.about') }}">@lang('About')</a>
          @guest
          <a class="nav-link active" href="{{ route('login') }}">@lang('Login')</a>
          <a class="nav-link active" href="{{ route('register') }}">@lang('Register')</a>
          @else
          <form id="logout" action="{{ route('logout') }}" method="POST">
            <a role="button" class="nav-link active"
               onclick="document.getElementById('logout').submit();">@lang('Logout')</a>
            @csrf
          </form>
          @endguest

        </div>
      </div>
    </div>
  </nav>

  <header class="masthead bg-primary text-white text-center py-4">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'Game store app')</h2>
    </div>
  </header>
  <!-- header -->

  <div class="container my-4">
    @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>
</html>