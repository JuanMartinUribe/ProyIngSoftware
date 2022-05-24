<?php

namespace App\utils;

class SaveImage {

    public static function saveImage(Request $request,$game)
    {
        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/games/', $filename);
            $game->image = $filename;
        }
        $game->save();
    }

}