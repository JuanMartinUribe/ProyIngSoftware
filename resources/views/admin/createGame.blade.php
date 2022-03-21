@extends('layouts.admin')
@section('content')

<form action="{{ route('game.save')}}" method="post">
               @csrf
              <input type="text" class="form-control mb-2" placeholder= "name" name="name" value="{{ old('name') }}" />
              <input type="text" class="form-control mb-2" placeholder= "description" name="description" value="{{ old('description') }}" />
              <input type="text" class="form-control mb-2" placeholder= "developer" name="developer" value="{{ old('developer') }}" />
              <input type="text" class="form-control mb-2" placeholder= "genre" name="genre" value="{{ old('genre') }}" />
              <input type="text" class="form-control mb-2" placeholder= "price" name="price" value="{{ old('price') }}" />
              <input type="text" class="form-control mb-2" placeholder= "soldamount" name="soldamount" value="{{ old('soldamount') }}" />
              <input type="submit" class="btn btn-primary" value="Send" />
</form>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@endsection