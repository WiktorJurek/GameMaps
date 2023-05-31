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
}
