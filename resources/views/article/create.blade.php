@extends('layouts.app')
@section('content')

<form action="{{ route('article.save')}}" method="post">
    @csrf
    <input type="text" class="form-control mb-2" placeholder= "@lang('Title')" name="name" value="{{ old('name') }}" />
    @lang('Description'):
    <textarea id="text" class="testInput"style="height:200px; width:1200px;font-size:14pt;" name="description" value="{{ old('description') }}"> </textarea>
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