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

class ArticleController extends Controller
{
    public function index()
    {   
        $viewData = [];
        $articles = Article::all();
        $viewData["articles"] = $articles;
        
        
        return view('admin.articleIndex')->with("viewData", $viewData);
        

    }

    public function create()
    {   
        return view('admin.createArticle');
    }
    public function save(Request $request)
    {
        Article::validate($request);
        Article::create($request->only(['name','description','user_id','game_id']));
        return redirect()->route('admin.index');
    }

    public function edit(Request $request)
    {
        $article = Article::find($request->id);
        
        return view('admin.articleUpdate')->with("article", $article);
    }
    public function update(Request $request)
    {

        Article::validate($request);
        Article::where('id', $request->id)->update($request->only(['name','description','game_id','user_id']));
        return view("admin.index");

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