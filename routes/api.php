<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MarkerController;
use App\Http\Controllers\Api\V1\GameController;
use App\Http\Controllers\Api\V1\MapController;
use App\Http\Controllers\Api\V1\LayerController;
use App\Http\Controllers\Api\V1\UserMarkerController;
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
    Route::apiResource('user_markers', UserMarkerController::class);
    Route::post('user_markers',[UserMarkerController::class,'store']);
    Route::delete('user_markers/{userId}/{markerId}',[UserMarkerController::class,'destroyUserMarker']);
    Route::get('games/getbyslug/{slug}',[GameController::class,'getBySlug']);
    Route::get('maps/getbyslug/{slug}',[MapController::class,'getBySlug']);
    Route::get('maps/getbygame/{game}',[MapController::class,'getByGame']);
    Route::get('markers/getbygame/{game}/{userId}',[MarkerController::class,'getByGame']);
    Route::get('user_markers/getbygame/{game}/{userId}',[UserMarkerController::class,'getUserMarkersByGame']);
    // Route::get('markers/getbygame/{game}',[MarkerController::class,'getByGame']);
    Route::get('layers/getbygame/{game}',[LayerController::class,'getByGame']);
});