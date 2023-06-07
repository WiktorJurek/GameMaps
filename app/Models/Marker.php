<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    use HasFactory;

    public static function transformForLayers($gameId) {

        $markers = Marker::where('game',$gameId)->get();

        return collect($markers)
            ->groupBy('type')
            ->map(function ($items) {
                return $items->map(function ($item) {
                    return [
                        "id" => $item["id"],
                        "coords" => json_decode($item["coords"])
                    ];
                });
            });      
    }
}
