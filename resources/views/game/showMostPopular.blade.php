@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://i.pinimg.com/originals/72/3d/0a/723d0af616b1fe7d5c7e56a3532be3cd.png" class="img-fluid rounded-start"
        width="200" 
        height="400"
      ><br>
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
        <a class="btn bg-primary text-white btn-sm" href="{{ route('article.show', ["id" => $article->getId()]) }}">- {{ $article->getName() }}<br></a>
          @if($article->getUser()->getId()==Auth::id())
              <form method="post" action="{{ route('article.delete',['id'=> $article->getId()]) }}" >
                  @csrf
                <input type="submit" value="@lang('Delete article')" /><br>
              </form>
          @endif
          <br>
        @endforeach
      @if(Auth::id())
      <br><a class="btn bg-primary text-white" href="{{ route('article.create',['relatedGameId'=>$viewData["game"]->getId(),'relatedUserId' => Auth::id()  ])}}">@lang('Create new article')</a>
      @endif
      </div>
    </div>
    <h5 class="card-title text-center">
      <a class="btn bg-primary text-white" href="{{ route('game.index') }}">@lang('Games')</a>
    </h5>
  </div>
</div>
@endsection