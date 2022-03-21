@extends('layouts.admin')
@section('content')

<div class="row">
  @foreach ($viewData["articles"] as $article)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
            {{$article->getId() }} <br>
            {{$article->getName() }} <br>
            <form method="post" action="{{ route('article.delete',['id'=> $article->getId()])}}" >
              @csrf
              <input type="submit" value="Delete Article" />
            </form>           
      </div>    
    </div>
  </div>
  @endforeach
</div>

@endsection