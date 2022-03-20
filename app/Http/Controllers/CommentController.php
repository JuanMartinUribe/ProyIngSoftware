<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function create($relatedGameId,$relatedUserId)
    {   
        $viewData = [];
        $viewData["relatedGameId"] = $relatedGameId;
        $viewData["relatedUserId"] = $relatedUserId;
        return view('article.create') -> with("viewData",$viewData);  
    }

    public function save(Request $request)
    {
        Comment::validate($request);
        Comment::create($request->only(["description","article_id","user_id"]));
        return redirect()->back()->with('message', 'comment added succesfully!');
    }

}