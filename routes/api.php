<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MarkerController;
use App\Http\Controllers\Api\V1\GameController;
use App\Http\Controllers\Api\V1\MapController;
use App\Http\Controllers\Api\V1\LayerController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('markers', MarkerController::class);
    Route::apiResource('maps', MapController::class);
    Route::apiResource('games', GameController::class);
    Route::get('games/getbyslug/{slug}',[GameController::class,'getBySlug']);
    Route::get('maps/getbyslug/{slug}',[MapController::class,'getBySlug']);
    Route::get('maps/getbygame/{game}',[MapController::class,'getByGame']);
    Route::get('markers/getbygame/{game}',[MarkerController::class,'getByGame']);
    Route::get('markers/getbygame/{game}',[MarkerController::class,'getByGame']);
    Route::get('layers/getbygame/{game}',[LayerController::class,'getByGame']);
});