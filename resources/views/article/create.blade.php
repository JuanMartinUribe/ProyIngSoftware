@extends('layouts.app')
@section('content')

<form action="{{ route('article.save')}}" method="post">
               @csrf
              <input type="text" class="form-control mb-2" placeholder= "Article Name" name="name" value="{{ old('name') }}" />
              <input type="text" class="form-control mb-2" placeholder= "Description" name="description" value="{{ old('description') }}" />
              <input id="game_id" name="game_id" type="hidden" value={{$viewData["relatedGameId"]}} >
              <input id="user_id" name="user_id" type="hidden" value={{$viewData["relatedUserId"]}} >
              <input type="submit" class="btn btn-primary" value="Send" />
</form>


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@endsection 