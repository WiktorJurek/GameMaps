<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Map;


class MapController extends Controller
{
    public function index() 
    {
        return Map::all();
    }
    public function show($id) 
    {
        return Map::where('id',$id)->get();
    }
    public function getBySlug($slug)
    {
        return Map::getMapDataBySlug($slug);
    }
    public function getByGame($gameId)
    {
        return Map::where('game',$gameId)->get();
    }
}
