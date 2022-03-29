@extends('layouts.app')
@section('content')

<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img class="image rounded-circle" src="{{asset('/uploads/games/'.$viewData["article"]->Game->getImage() )}}" alt="image" style="width: 160px;height: 160px; padding: 10px; margin: 0px; ">
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
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$comment->getUser()->getName()}}: </h5>
              <p> {{ $comment->getDescription() }}
              </p>
              @if($comment->getUser()->getId()==Auth::id())
                <form method="post" action="{{ route('comment.delete',['id'=> $comment->getId()]) }}" >
                  @csrf
                  <input type="submit" value="@lang('Delete Comment')" />
                </form>
              @endif
            </div>
          </div>
        @endforeach
        <br>
        <form action="{{ route('comment.save')}}" method="post">
          @csrf
          <input type="text" class="form-control mb-2" placeholder= "@lang('Comment here')" name="description" value="{{ old('description') }}" />
          <input id="article_id" name="article_id" type="hidden" value={{$viewData["article"]->getId()}} >
          <input id="user_id" name="user_id" type="hidden" value={{Auth::id()}} >
          <input type="submit" class="btn btn-primary" value="@lang('Add comment')" />
        </form>
        <br>
        <a class="btn bg-primary text-white" href="{{ route('game.show', ['id'=> $viewData["article"]->getGameId()]) }}">@lang('Back')</a>
      </div>
    </div>
  </div>
</div>
@endsection