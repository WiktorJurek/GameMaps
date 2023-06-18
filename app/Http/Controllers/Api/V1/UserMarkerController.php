<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserMarkerRequest;
use App\Http\Requests\UpdateUserMarkerRequest;
use App\Models\UserMarker;

class UserMarkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserMarker::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserMarkerRequest $request)
    {
        UserMarker::create($request->validated());
        return response()->json('marker created');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserMarker $userMarker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserMarker $userMarker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserMarkerRequest $request, UserMarker $userMarker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserMarker $userMarker)
    {
        $userMarker->delete();
        return response()->json("Marker deleted");
    }

    public function destroyUserMarker($userId,$markerId)
    {
        UserMarker::where('id_user',$userId)->where('id_marker',$markerId)->delete();
        return response()->json("Marker deleted");
    }

    public function getUserMarkersByGame($gameId,$userId)
    {
        return UserMarker::getUserMarkersByGame($userId,$gameId);
        // return response()->json("Marker deleted");
    }
}
