@extends('layouts.app')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
        <img src="https://i.pinimg.com/originals/72/3d/0a/723d0af616b1fe7d5c7e56a3532be3cd.png" class="img-fluid rounded-start"
          width="200" 
          height="400">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["article"]->getName() }} <br> 
           {{ $viewData["article"]->getCreatedAt() }} <br>
           Author : {{$viewData["article"]->getUser()->getName()}}
        </h5>
        <p class="card-text"><b> @lang('Description') </b> <br> {{ $viewData["article"]->getDescription() }}</p>
        @foreach ($viewData["comments"] as $comment)
          <div class="col-md-5 col-lg-5 mb-2">
            <div class="card">
              <div class="card-body text-center">
              <p>{{$comment->getUser()->getName()}} <br> comment: <br>{{ $comment->getDescription() }} 
              @if($comment->getUser()->getId()==Auth::id())
              <form method="post" action="{{ route('comment.delete',['id'=> $comment->getId()]) }}" >
                  @csrf
                <input type="submit" value="@lang('Delete Comment')" />
              </form>
              @endif
              </div>
            </div>
          </div>
        @endforeach
        <form action="{{ route('comment.save')}}" method="post">
               @csrf
              <input type="text" class="form-control mb-2" placeholder= "@lang('Comment here')" name="description" value="{{ old('description') }}" />
              <input id="article_id" name="article_id" type="hidden" value={{$viewData["article"]->getId()}} >
              <input id="user_id" name="user_id" type="hidden" value={{Auth::id()}} >
              <input type="submit" class="btn btn-primary" value="@lang('Add comment')" />
        </form>
        <br>
        <a class="btn bg-primary text-white" href="{{ route('game.show', ['id'=> $viewData["article"]->getGameId()]) }}">Back</a>
      </div>
    </div>
  </div>
</div>
@endsection