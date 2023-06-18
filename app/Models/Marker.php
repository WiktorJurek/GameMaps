<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    use HasFactory;

    public static function transformForLayers($gameId,$userId=null) {

        $userMarkers = [];
        if($userId) {
            $userMarkers = UserMarker::getUserMarkersByGame($userId,$gameId);
        }

        $markers = Marker::where('game',$gameId)->get();

        return collect($markers)
            ->groupBy('id_layer')
            ->map(function ($items) use($userMarkers) {
                return $items->map(function ($item) use($userMarkers) {
                    return [
                        "id" => $item["id"],
                        "coords" => json_decode($item["coords"]),
                        "visible" => in_array($item["id"],$userMarkers) ? false : true,
                    ];
                });
            });   
    }
}
