<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
</head>
<body>
  <nav class="navbar fixed-bottom navbar-expand-lg navbar-light" style="background-color: #615c5c;">

      <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}"><img src="https://i.ibb.co/rsNfwLL/Logo.png" width="200" height="100"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active text-white" href="{{ route('admin.index') }}">@lang('Admin home')</a>
            <a class="nav-link active text-white" href="{{ route('game.adminIndex') }}">@lang('Games')</a>
            <a class="nav-link active text-white" href="{{ route('article.adminIndex') }}">@lang('Articles')</a>
            <div class="vr bg-white mx-2 d-none d-lg-block"></div>
            <a class="nav-link active text-white" href="{{ route('home.index') }}">@lang('Back to user page')</a>
          </div>
        </div>
      </div>
  </nav>
  <header class="masthead text-white text-center py-4"style="background-color: #0863a6;">
    <div class="container d-flex align-items-center flex-column">
      <h2>@yield('subtitle', 'Admin panel')</h2>
    </div>
  </header>
  <div class="container my-4">
    @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>
</html>