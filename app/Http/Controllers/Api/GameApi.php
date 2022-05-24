<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\GameCollection;
use App\Http\Controllers\Controller;
use App\Models\Game;

class GameApi extends Controller
{
    public function index()
    {
        return new GameCollection(Game::all());
    }
    
    public function paginate()
    {
        return new GameCollection(Game::paginate(5));
    }
    public function show($id)
    {
        return Game::findOrFail($id);
    }
}