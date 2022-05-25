<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ProductResources;
use App\Http\Controllers\Controller;

use App\Models\Flower;
use Http;

class FishApi extends Controller

{

    public function index()

    {
        $answer = Http::get("http://adventurefishalist.tk/public/api/locations");
        $answer->json();
        $data['fishes'] = $answer['data'];
       # $data['courses'] = $data['courses'];
        #dd($data);
        return view('api.fish',compact('data'));
    }

}