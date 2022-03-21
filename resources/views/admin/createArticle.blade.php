@extends('layouts.admin')
@section('content')

<form action="{{ route('article.save')}}" method="post">
               @csrf
              <input type="text" class="form-control mb-2" placeholder= "name" name="name" value="{{ old('name') }}" />
              <input type="text" class="form-control mb-2" placeholder= "description" name="description" value="{{ old('description') }}" />
              <input type="text" class="form-control mb-2" placeholder= "game_id" name="game_id" value="{{ old('game_id') }}" />
              <input type="text" class="form-control mb-2" placeholder= "user_id" name="user_id" value="{{ old('user_id') }}" />
              <input type="submit" class="btn btn-primary" value="Send" />
</form>

@endsection