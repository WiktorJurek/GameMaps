<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marker;

class MarkerController extends Controller
{
    public function index() 
    {
        return Marker::all();
    }

    public function getByGame($gameId) 
    {    
        $markers = Marker::where('game',$gameId)->get();

        foreach ($markers as $key => &$marker) {
            $marker['coords'] = json_decode($marker['coords']);
        }
        
        return $markers;
    }
}
