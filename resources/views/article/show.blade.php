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
           Published Date: {{ $viewData["article"]->getCreatedAt() }} <br>
           Author : {{$viewData["article"]->getUser()["name"]}}
        </h5>
        <p class="card-text"><b> Decription </b> <br> {{ $viewData["article"]->getDescription() }}</p>
        @foreach ($viewData["comments"] as $comment)
          <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
              <div class="card-body text-center">
              <p>user: {{$comment->getUser()["name"]}} <br> comment: {{ $comment->getDescription() }} 
              @if($comment->getUser()["id"]==Auth::id())
              <form method="post" action="{{ route('comment.delete',['id'=> $comment->getId()]) }}" >
                  @csrf
                <input type="submit" value="Delete Comment" />
              </form>
              <br>              
              @endif
              </div>
            </div>
          </div>
        @endforeach
        <form action="{{ route('comment.save')}}" method="post">
               @csrf
              <input type="text" class="form-control mb-2" placeholder= "comment here" name="description" value="{{ old('description') }}" />
              <input id="article_id" name="article_id" type="hidden" value={{$viewData["article"]->getId()}} >
              <input id="user_id" name="user_id" type="hidden" value={{Auth::id()}} >
              <input type="submit" class="btn btn-primary" value="Add Comment" />
        </form>
      </div>
    </div>
  </div>
</div>
@endsection