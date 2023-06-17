<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    public static function getMapDataBySlug($slug) {

        $mapData = Map::where('slug',$slug)->get();

        foreach($mapData as $key => &$map) {
            $map['coords'] = json_decode($map['coords']);
        }

        return $mapData;
    }
}
