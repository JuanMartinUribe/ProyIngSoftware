@extends('layouts.admin')
@section('content')

<center>
    <div class="card-body text-center" style="width: 25rem;">
        <form action="{{ route('admin.articleUpdate',['id'=> $article->getId()]) }}" method="post">
                    @csrf
                    <input type="text" class="form-control mb-2" placeholder= "name" name="name" value="{{ $article->getName() }}" />
                    @lang('Description')
                    <textarea id="text" class="testInput" style="height:200px; width:600px;font-size:14pt;"  placeholder= "description" name="description" value="{{ $article->getDescription() }}"> </textarea>
                    <input type="text" class="form-control mb-2" placeholder= "game_id" name="game_id" value="{{ $article->getGameId() }}" />
                    <input type="text" class="form-control mb-2" placeholder= "user_id" name="user_id" value="{{ $article->getUserId() }}" />
                    <input type="submit" class="btn btn-primary" value="Send" />
        </form>
    </div>
</center>
@endsection