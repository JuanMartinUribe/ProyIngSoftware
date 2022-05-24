<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GameCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
        'data' => $this->collection,
        'additionalData' => [
            'storeName' => 'Game Store',
            'storeGamesLink' => 'http://35.193.146.241/ProyIngSoftware/public/games',
            ],
        ];
    }
}