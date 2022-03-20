<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
        $viewData = [];
        //$viewData["articles"] = Article::all();
        //$viewData["articles"] = Product::with('comments')->get(); para relaciones entre clases
        
        $viewData["articles"] = Article::orderBy('id', 'DESC')->get();

        return view('article.index') -> with("viewData",$viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $article = Article::findOrFail($id);
        $viewData["article"] = $article;    
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
        return redirect()->back()->with('message', 'article created succesfully!');
    }

}