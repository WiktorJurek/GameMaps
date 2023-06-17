<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;


class GameController extends Controller
{
    public function index() 
    {
        return Game::all();
    }
    public function show($id) 
    {
        return Game::where('id',$id)->get();
    }
    public function getBySlug($slug) 
    {
        return Game::where('slug',$slug)->get();
    }
}
