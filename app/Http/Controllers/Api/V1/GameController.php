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
}
