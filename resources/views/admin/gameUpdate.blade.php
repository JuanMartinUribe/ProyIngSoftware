@extends('layouts.admin')
@section('content')

<center>
    <div class="card-body text-center" style="width: 25rem;">
        <form action="{{ route('admin.gameUpdate',['id'=> $game->getId()]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control mb-2" placeholder= "name" name="name" value="{{ $game->getName() }}" />
                    <input type="text" class="form-control mb-2" placeholder= "description" name="description" value="{{ $game->getDescription() }}" />
                    <input type="text" class="form-control mb-2" placeholder= "developer" name="developer" value="{{ $game->getDeveloper() }}" />
                    <input type="text" class="form-control mb-2" placeholder= "genre" name="genre" value="{{ $game->getGenre() }}" />
                    <input type="text" class="form-control mb-2" placeholder= "price" name="price" value="{{ $game->getPrice() }}" />
                    <input type="text" class="form-control mb-2" placeholder= "soldamount" name="soldamount" value="{{ $game->getSoldAmount() }}" />
                    <input type="file" class="form-control" name="image" value="{{ asset('/uploads/games/'.$game->getImage() ) }}"/>
                    <input type="submit" class="btn btn-primary" value="Send" />
        </form>
    </div>
</center>
@endsection