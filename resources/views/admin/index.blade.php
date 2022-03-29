@extends('layouts.admin')
@section('title', 'Home Page - Online Store')
@section('content')

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">@lang('New game')</h5>
        <p class="card-text">@lang('Click on the following button to create a new game.')</p>
        <a href="{{route('admin.createGame')}}"><button type="submit" >@lang('Create game')</button> <br> <br></a>
        </div>
    </div>
  </div>
  <div class="col-sm-6">  
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">@lang('New article')</h5>
        <p class="card-text">@lang('Click on the following button to create a new article.')</p>
        <a href="{{route('admin.createArticle')}}"><button type="submit" >@lang('Create article')</button> <br> <br></a>
      </div>
    </div>
  </div>
</div>
@endsection