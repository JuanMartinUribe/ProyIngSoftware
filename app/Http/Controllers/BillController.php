<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BillFile;
use App\Models\Item;
use Illuminate\Http\Request;


class BillController extends Controller
{
    public function generateFile($id,Request $request)
    {
        $billInterface = app(BillFile::class);
        return $billInterface->generate($id,$request);
    }

}