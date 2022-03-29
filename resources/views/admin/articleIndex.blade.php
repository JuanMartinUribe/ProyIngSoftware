@extends('layouts.admin')
@section('content')

<div class="row">
  @foreach ($viewData["articles"] as $article)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
    <img class="image rounded" src="{{asset('/uploads/games/'.$article->Game->getImage() )}}" alt="image" style="align:center width: 320px;height: 320px; padding: 10px; margin: 0px; ">
      <div class="card-body text-center">
            {{$article->getId() }} <br>
            {{$article->getName() }} <br>
            {{$article->getDescription() }} <br>
            <form method="post" action="{{ route('article.delete',['id'=> $article->getId()])}}" >
              @csrf
              <input type="submit" value="Delete Article" />
            </form>
            <a href="{{ route('article.edit',['id'=> $article->getId()]) }} ">Update</a>  
      </div>    
    </div>
  </div>
  @endforeach
</div>

@endsection