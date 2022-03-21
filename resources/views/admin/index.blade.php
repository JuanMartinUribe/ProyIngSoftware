@extends('layouts.admin')
@section('title', 'Home Page - Online Store')
@section('content')
<div class="text-center">
    <a href="{{route('game.admincreate')}}"><button type="submit" >Create Game</button> <br> <br></a>
    <a href="{{route('article.admincreate')}}"><button type="submit" >Create Article</button> <br> <br></a>
    <a href="{{route('article.adminindex')}}"><button type="submit" >Articles</button> <br> <br></a>
    <a href="{{route('game.adminindex')}}"><button type="submit" >Games</button> <br> <br></a>
</div>
@endsection