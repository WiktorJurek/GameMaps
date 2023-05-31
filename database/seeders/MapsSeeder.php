<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Map;

class MapsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Map::truncate();

        $json = file_get_contents("database/json/nfs-underground-2-map.json");
        $map = json_decode($json);

        $mapsData[] = [
            'game' => $map->game,
            'name' => $map->name,
            'zoom' => $map->zoom,
            'coords' => json_encode($map->coords[0])
        ]; 

        Map::insert($mapsData);
    }
}
