<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Game;
class GameController extends Controller
{
    public function index(){
        $viewData = [];
        //$viewData["games"] = Game::all();
        //$viewData["games"] = Product::with('comments')->get(); para relaciones entre clases
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of Games";
        $viewData["games"] = Game::orderBy('id', 'DESC')->get();

        return view('game.index') -> with("viewData",$viewData);
    }

    public function show($id)
    {   
        $game = Game::findOrFail($id);
        $viewData = [];
        $viewData["title"] = $game->getName()." - Online Store";
        $viewData["subtitle"] =  $game->getName()." - Game information";
        $viewData["game"] = $game;

        return view('game.show') -> with("viewData",$viewData);
    }
    public function showTopSellers()
    {
        $viewData = [];
        $games = Game::orderBy('price','DESC')->take(3)->get();
        $viewData["games"] = $games;    
        $viewData["title"] = "Most Selled Games";
        $viewData["subtitle"] = "Top 3";
        return view('game.showTopSellers') -> with("viewData",$viewData);
    }

    public function create()
    {
        return view('game.create');  
    }

    public function save(Request $request)
    {
        /*$request->validate([
            "name" => "required",
            "description" => "required"
        ]);*/

        game::validate($request);
        game::create($request->only(["name","description"]));
        return redirect()->back()->with('message', 'game created succesfully!');
    }

    public function delete(Request $id){
        $game = game::find($id);
        $game->each->delete();
        return redirect()->route('game.index');
    }

}