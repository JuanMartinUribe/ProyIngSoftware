@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
@if(Auth::id())
<a class="navbar-createArticle" href="{{ route('article.create',['relatedGameId'=>$viewData["game"]->getId(),'relatedUserId' => Auth::id()  ])}}">Create Article</a>
@endif
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["game"]->getName() }}
        </h5>
        <p class="card-text">{{ $viewData["game"]->getPrice() }}</p>
        @foreach($viewData["articles"] as $article)
        <a class href="{{ route('article.show', ["id" => $article->getId()]) }}">- {{ $article->getName() }}<br /></a>
          @if($article->getUser()["id"]==Auth::id())
              <form method="post" action="{{ route('article.delete',['id'=> $article->getId()]) }}" >
                  @csrf
                <input type="submit" value="Delete Article" />
              </form>
              <br>              
          @endif
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection