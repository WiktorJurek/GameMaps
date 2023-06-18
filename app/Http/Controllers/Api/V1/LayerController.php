<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layer;

class LayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreLayerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Layer $layer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layer $layer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLayerRequest $request, Layer $layer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layer $layer)
    {
        //
    }

    public function getByGame($gameId) {
        return Layer::transformLayers($gameId);
    }
}
