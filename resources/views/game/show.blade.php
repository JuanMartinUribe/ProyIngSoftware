@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
      @if(Auth::id())
      <a  class="btn bg-primary text-white" href="{{ route('article.create',['relatedGameId'=>$viewData["game"]->getId(),'relatedUserId' => Auth::id()  ])}}">Create New Article</a>
      @endif
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

        <b>Price</b>  : <p class="card-text">{{ $viewData["game"]->getPrice() }}</p>
        <b>Developed By</b>: <p class="card-text">{{ $viewData["game"]->getdeveloper() }}</p>
        <b>Game Description</b> : <p class="card-text">{{ $viewData["game"]->getDescription() }}</p>
        <b>Genre</b> : <p class="card-text">{{ $viewData["game"]->getGenre() }}</p>
        <b>Related Articles:</b> <br>

        @foreach($viewData["articles"] as $article)
        <a class="btn bg-primary text-white" href="{{ route('article.show', ["id" => $article->getId()]) }}">{{ $article->getName() }}</a><br>
          @if($article->getUser()->getId()==Auth::id())
              <form method="post" action="{{ route('article.delete',['id'=> $article->getId()]) }}" >
                  @csrf
                <input type="submit" value="Delete Article" />
              </form>
          @endif
          <br>
        @endforeach
        
      </div>
      <a href="{{ route('cart.add', ['id'=> $viewData["game"]->getId() ]) }}"
        class="btn bg-primary text-white"> Add Game To Cart</a>
       <a href="{{ route('game.index') }}"
        class="btn-sm bg-primary text-white">Back</a>
    </div>
  </div>

</div>
@endsection