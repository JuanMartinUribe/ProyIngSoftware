<?php

/*
Juan Martin
Jmuribef@eafit.edu.co 
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $viewData = [];        
        $viewData["articles"] = Article::orderBy('id', 'DESC')->get();

        return view('article.index') -> with("viewData",$viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $article = Article::findOrFail($id);
        $viewData["article"] = $article;
        $viewData["comments"] = $article->getComments();    
        return view('article.show') -> with("viewData",$viewData);
    }

    public function create($relatedGameId,$relatedUserId)
    {   
        $viewData = [];
        $viewData["relatedGameId"] = $relatedGameId;
        $viewData["relatedUserId"] = $relatedUserId;
        return view('article.create') -> with("viewData",$viewData);  
    }

    public function save(Request $request)
    {
        Article::validate($request);
        Article::create($request->only(["name","description","game_id","user_id"]));
        return redirect()->route('game.show',$request["game_id"]);
    }

    public function delete(Request $request)
    {   
        $id = $request["id"];
        $article = Article::findOrFail($id);
        $article->comments()->delete();
        Article::where('id', $id)->delete();
        return redirect()->back();
    }

}