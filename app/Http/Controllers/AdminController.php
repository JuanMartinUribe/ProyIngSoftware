<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
Daniel Giraldo
Djgiraldot@eafit.edu.co
*/

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Article;

class AdminController extends Controller
{

    public function createArticle()
    {   
        $user = Auth::user();
        if ($user && $user->getIsAdmin()) {
            return view('admin.createArticle');
        }
        else
        {
            abort(404);
        }
        
    }
    public function createGame()
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
    
    /*
    public function saveGame(Request $request)
    {

        Game::validate($request);
        Game::create($request->only(['name','description','price','genre','developer','image']));
        
        $game = Game::latest()->first();

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/games/', $filename);
            $game->image = $filename;
        }
        $game->save();
        return redirect()->route('admin.index');
    }
    public function saveArticle(Request $request)
    {


        Article::validate($request);
        Article::create($request->only(['name','description','user_id','game_id']));
        return redirect()->route('admin.index');
    } 
    */
}
