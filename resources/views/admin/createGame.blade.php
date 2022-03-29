@extends('layouts.admin')
@section('content')

<center>
    <div class="card-body text-center" style="width: 25rem;">
        <form action="{{ route('game.adminSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control mb-2" placeholder= "name" name="name" value="{{ old('name') }}" />
                    <input type="text" class="form-control mb-2" placeholder= "description" name="description" value="{{ old('description') }}" />
                    <input type="text" class="form-control mb-2" placeholder= "developer" name="developer" value="{{ old('developer') }}" />
                    <input type="text" class="form-control mb-2" placeholder= "genre" name="genre" value="{{ old('genre') }}" />
                    <input type="text" class="form-control mb-2" placeholder= "price" name="price" value="{{ old('price') }}" />
                    <input type="text" class="form-control mb-2" placeholder= "soldamount" name="soldamount" value="{{ old('soldamount') }}" />
                    <input type="file" class="form-control" name="image"/>
                    <input type="submit" class="btn btn-primary" value="Send" />
        </form>
    </div>
</center>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@endsection