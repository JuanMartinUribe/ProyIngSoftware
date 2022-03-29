<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use App\Models\Game;
class GameController extends Controller
{
    public function index()
    {
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
        $viewData["articles"] = $game->getArticles();
        $viewData["title"] = $game->getName()." - Online Store";
        $viewData["subtitle"] =  $game->getName()." - Game information";
        $viewData["game"] = $game;
        return view('game.show') -> with("viewData",$viewData);
    }
    public function showTopSellers()
    {
        $viewData = [];
        $games = Game::orderBy('soldamount','DESC')->take(3)->get();
        $viewData["games"] = $games;    
        $viewData["title"] = "Most Selled Games";
        $viewData["subtitle"] = "Top 3 BestSellers";
        return view('game.showFilteredGames') -> with("viewData",$viewData);
    }
    public function showCheapGames()
    {
        $viewData = [];
        $games = Game::orderBy('price')->take(5)->get();
        $viewData["games"] = $games;    
        $viewData["title"] = "Cheap Games";
        $viewData["subtitle"] = "5 low price games";
        return view('game.showFilteredGames') -> with("viewData",$viewData);
    }

    public function adminCreate()
    {   
        return view('admin.createGame');
    }

    public function showMostPopular()
    {
        $games = Game::all();
        $mostPopular = $games[0];
        $quantity = $mostPopular->articles()->count();
        foreach ($games as $key => $game)
        {
            $actualQuantity = $game->articles()->count();
            if ($actualQuantity>$quantity)
            {
                $mostPopular = $game;
                $quantity = $actualQuantity;
            }
        }
        $viewData = [];
        $viewData["game"] = $mostPopular;
        $viewData["title"] = "TOP 1";
        $viewData["subtitle"] = "Trending Game";
        $viewData["articles"] = $mostPopular->getArticles();
        return view('game.showMostPopular')->with("viewData",$viewData);
    }

    public function showRecentGames()
    {
        $games = Game::orderBy('created_at','DESC')->take(3)->get();
        $viewData = [];
        $viewData["games"] = $games;    
        $viewData["title"] = "Most Selled Games";
        $viewData["subtitle"] = "New Releases";
        return view('game.showFilteredGames') -> with("viewData",$viewData);
    }

    public function delete(Request $request){
        $game = Game::find($request->id);
        $game->delete();
        return redirect()->back();
    }

    public function adminSave(Request $request)
    {
        Game::validate($request);
        Game::create($request->only(['name','description','price','genre','developer','image']));
        $game = Game::latest()->first();
        Game::saveImage($request,$game);
        return redirect()->route('admin.index');
    }


    public function edit(Request $request){
        $game = Game::find($request->id);
        
        return view('admin.gameUpdate')->with("game",$game);
    }

    public function update(Request $request){

        $game = Game::find($request->id);
        Game::validate($request);
        Game::where('id',$request->id)->update($request->only(['name','description','price','genre','developer','image']));
        Game::saveImage($request,$game);
        return view('admin.index');

    }
}