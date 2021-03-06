<?php
/*
Juan Martin
Jmuribef@eafit.edu.co 
*/
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
        $viewData["title"] = __('Products store');
        $viewData["subtitle"] =  __('Games list');
        $viewData["games"] = Game::orderBy('id', 'DESC')->get();
        return view('game.index') -> with("viewData", $viewData);
    }

    public function show($id)
    {   
        $game = Game::findOrFail($id);
        $viewData = [];
        $viewData["articles"] = $game->getArticles();
        $viewData["title"] = $game->getName().__('Store');
        $viewData["subtitle"] =  $game->getName().__('Game info');
        $viewData["game"] = $game;
        return view('game.show') -> with("viewData", $viewData);
    }
    public function showTopSellers()
    {
        $viewData = [];
        $games = Game::orderBy('soldamount', 'DESC')->take(3)->get();
        $viewData["games"] = $games;    
        $viewData["title"] = __('Most selled');
        $viewData["subtitle"] = __('Top sellers');
        return view('game.showFilteredGames') -> with("viewData",$viewData);
    }
    public function showCheapGames()
    {
        $viewData = [];
        $games = Game::orderBy('price')->take(5)->get();
        $viewData["games"] = $games;    
        $viewData["title"] = __('Cheap');
        $viewData["subtitle"] = __('Low price');
        return view('game.showFilteredGames') -> with("viewData",$viewData);
    }


    public function showMostPopular()
    {
        $games = Game::all();
        $mostPopular = $games[0];
        $quantity = $mostPopular->articles()->count();
        foreach ($games as $key => $game)
        {
            $actualQuantity = $game->articles()->count();
            if ($actualQuantity>$quantity) {
                $mostPopular = $game;
                $quantity = $actualQuantity;
            }
        }
        $viewData = [];
        $viewData["game"] = $mostPopular;
        $viewData["title"] = __("Top 1");
        $viewData["subtitle"] = __("Trending");
        $viewData["articles"] = $mostPopular->getArticles();
        return view('game.showMostPopular')->with("viewData", $viewData);
    }

    public function showRecentGames()
    {
        $games = Game::orderBy('created_at', 'DESC')->take(3)->get();
        $viewData = [];
        $viewData["games"] = $games;    
        $viewData["title"] = __('Most selled');
        $viewData["subtitle"] = __('Releases');
        return view('game.showFilteredGames') -> with("viewData",$viewData);
    }
}
