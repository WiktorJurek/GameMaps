<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMarker extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'id_game',
        'id_marker',
    ];

    public static function getUserMarkersByGame($userId,$gameId) {
        $userMarkers = UserMarker::where('id_user',$userId)->where('id_game',$gameId)->pluck('id_marker')->toArray();
        return $userMarkers;
    }
}
