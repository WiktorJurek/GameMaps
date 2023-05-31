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
}
