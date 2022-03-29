@extends('layouts.app')
@section('title')
@section('subtitle')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-4 ms-auto">
      @lang('About information')
    </div>
    <div class="col-lg-4 me-auto">
      <h5>
        @lang('Made by')<br>
      </h5>
      @lang('Daniel')<br>
      @lang('Juan')<br>
    </div>
  </div>
</div>
@endsection