<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layer extends Model
{
    use HasFactory;

    public static function transformLayers($gameId) {

        $layers = Layer::where('game',$gameId)->get();

        return collect($layers)
        ->groupBy('id')
        ->map(function ($items) {
            return $items->map(function ($item) {
                return [
                    "name" => $item["name"],
                    "slug" => $item["slug"],
                ];
            });
        });  

    }
}
