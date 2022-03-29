@extends('layouts.admin')
@section('content')

<div class="row">
  @foreach ($viewData["articles"] as $article)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
    <img src="http://d3ugyf2ht6aenh.cloudfront.net/stores/474/538/themes/common/logo-423068398-1643755563-fecd68ef5d3917e3cd76a94eee3b2f411643755563.png?0" class="card-img-top img-card">
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