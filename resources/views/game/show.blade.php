@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
    <img class="image rounded" src="{{asset('/uploads/games/'.$viewData["game"]->getImage() )}}" alt="image" style="width: 320px;height: 320px; padding: 10px; margin: 0px; ">
    <br>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["game"]->getName() }}
        </h5>
        <b>@lang('Price')</b>  : <p class="card-text">{{ $viewData["game"]->getPrice() }}</p>
        <b>@lang('Developed by')</b>: <p class="card-text">{{ $viewData["game"]->getdeveloper() }}</p>
        <b>@lang('Game description')</b> : <p class="card-text">{{ $viewData["game"]->getDescription() }}</p>
        <b>@lang('Genre')</b> : <p class="card-text">{{ $viewData["game"]->getGenre() }}</p>
        <b>@lang('Related articles'):</b> <br>
        @foreach($viewData["articles"] as $article)
        <a class="btn bg-primary text-white btn-sm" href="{{ route('article.show', ["id" => $article->getId()]) }}">- {{ $article->getName() }}</a><br>
          @if($article->getUser()["id"]==Auth::id())
              <form method="post" action="{{ route('article.delete',['id'=> $article->getId()]) }}" >
                  @csrf
                  <input type="submit" value="@lang('Delete article')" /><br> 
              </form>
          @endif
          <br>
        @endforeach
        @if(Auth::id())
          <a class="btn bg-primary text-white" href="{{ route('article.create',['relatedGameId'=>$viewData["game"]->getId(),'relatedUserId' => Auth::id()  ])}}">@lang('Create New Article')<br></a>
        @endif 
        <a class="btn bg-primary text-white" href="{{ route('cart.add', ['id'=> $viewData["game"]->getId() ]) }}">@lang('Add game to cart')</a>
      </div>
    </div>
  </div>
  <h5 class="card-title text-center">
    <a class="btn bg-primary text-white" href="{{ route('game.index') }}">@lang('Back')</a>
  </h5>
</div>
@endsection