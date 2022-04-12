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

class GameController extends Controller
{

    public function index()
    {   

        $viewData = [];
        $games = Game::all();
        $viewData["games"] = $games;
        
        $user = Auth::user();
        if ($user && $user->getIsAdmin()) {
            return view('admin.gameIndex')->with("viewData", $viewData);
        }
        else
        {
            abort(404);
        }
    }
    public function create()
    {   
        $user = Auth::user();
        if ($user && $user->getIsAdmin()) {
            return view('admin.createGame');
        }
        else
        {
            abort(404);
        }
        
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
        Game::saveImage($request, $game);
        return view('admin.index');

    }
    public function delete(Request $request)
    {
        $game = Game::find($request->id);
        $game->delete();
        return redirect()->back();
    }
}