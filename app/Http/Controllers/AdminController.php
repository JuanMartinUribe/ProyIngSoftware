<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Article;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index()
    {   
        $user = Auth::user();

        if ($user->getIsAdmin()){
            return view('admin.index');
        }
        else{
            abort(404);
        }
    }
    public function articleIndex()
    {   
        $viewData = [];
        $articles = Article::all();
        $viewData["articles"] = $articles;
        return view('admin.articleIndex')->with("viewData",$viewData);
    }
    public function gameIndex()
    {   
        $viewData = [];
        $games = Game::all();
        $viewData["games"] = $games;
        return view('admin.gameIndex')->with("viewData",$viewData);
    }
    public function createGame()
    {   

        return view('admin.createGame');
    }
    public function createArticle()
    {   

        return view('admin.createArticle');
    }
    public function saveGame(Request $request)
    {
        /*$request->validate([
            "name" => "required",
            "description" => "required"
        ]);*/

        Game::validate($request);
        Game::create($request->only(['name','description','price','genre','developer']));
        return redirect()->route('admin.index');
    }
    public function saveArticle(Request $request)
    {
        /*$request->validate([
            "name" => "required",
            "description" => "required"
        ]);*/

        Article::validate($request);
        Article::create($request->only(['name','description','user_id','game_id']));
        return redirect()->route('admin.index');
    }
}