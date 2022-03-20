<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller  
{

    public function delete(Request $request)
    {   
        $id = $request["id"];
        Comment::where('id', $id)->delete();
        return redirect()->back();
    }

    public function save(Request $request)
    {
        Comment::validate($request);
        Comment::create($request->only(["description","article_id","user_id"]));
        return redirect()->back()->with('message', 'comment added succesfully!');
    }

}