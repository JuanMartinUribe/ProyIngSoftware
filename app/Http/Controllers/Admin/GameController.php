<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
Daniel Giraldo
Djgiraldot@eafit.edu.co
*/

namespace App\Http\Controllers\Admin;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Article;
use App\utils\SaveImage;

class GameController extends Controller
{

    public function index()
    {   

        $viewData = [];
        $games = Game::all();
        $viewData["games"] = $games;

        return view('admin.gameIndex')->with("viewData", $viewData);
  
    }
    public function create()
    {   
        return view('admin.createGame');
    }
    public function save(Request $request)
    {
        Game::validate($request);
        Game::create($request->only(['name','description','price','genre','developer','image']));
        $game = Game::latest()->first();
        Game::saveImage($request, $game);
        return redirect()->route('admin.index');
    }
    public function edit(Request $request)
    {
        $game = Game::find($request->id);
        
        return view('admin.gameUpdate')->with("game", $game);
    }
    public function update(Request $request)
    {
        $game = Game::find($request->id);
        Game::validate($request);
        Game::where('id', $request->id)->update($request->only(['name','description','price','genre','developer','image','soldamount']));
        SaveImage::saveImage($request, $game);
        return view("admin.index");

    }
    public function delete(Request $request)
    {
        $game = Game::find($request->id);
        $game->delete();
        return redirect()->back();
    }
}