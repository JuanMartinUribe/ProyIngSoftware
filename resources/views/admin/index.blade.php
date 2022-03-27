@extends('layouts.admin')
@section('title', 'Home Page - Online Store')
@section('content')
<div class="text-center">
    <a href="{{route('game.adminCreate')}}"><button type="submit" >Create Game</button> <br> <br></a>
    <a href="{{route('article.adminCreate')}}"><button type="submit" >Create Article</button> <br> <br></a>
    <a href="{{route('article.adminIndex')}}"><button type="submit" >Articles</button> <br> <br></a>
    <a href="{{route('game.adminIndex')}}"><button type="submit" >Games</button> <br> <br></a>
</div>
@endsection