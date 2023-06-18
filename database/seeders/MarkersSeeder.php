<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marker;

class MarkersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Marker::truncate();

        $json = file_get_contents("database/json/nfs-underground-2.json");

        $markers = json_decode($json);
        $markersData = [];

        foreach ($markers as $place => $object) {
            foreach ($object as $key => $coords) {
                foreach ($coords as $coordsKey => $values) {

                    foreach ($values as $valuesKey => $coordsValues) {
                        $markersData[] = [
                            "game" => 1,
                            "id_layer" => $place,
                            "coords" => json_encode($coordsValues)
                        ];
                    }
                }
            }
        }

        Marker::insert($markersData);
    }
}
