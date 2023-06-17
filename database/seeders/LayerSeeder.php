<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layer;

class LayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layers = [
            1 => [
                'name' => 'Garage',
                'slug' => 'garage',
            ],
            2 => [
                'name' => 'Specialties Shop',
                'slug' => 'specialties-shop',
            ],
            3 => [
                'name' => 'Graphics Shop',
                'slug' => 'graphics-shop',
            ],
            4 => [
                'name' => 'Car lot',
                'slug' => 'car-lot',
            ],
            5 => [
                'name' => 'Performance Shop',
                'slug' => 'performance-shop',
            ],
            6 => [
                'name' => 'Body Shop',
                'slug' => 'body-shop',
            ],
            7 => [
                'name' => 'Drift',
                'slug' => 'drift',
            ],
            8 => [
                'name' => 'Circuit',
                'slug' => 'circuit',
            ],
            9 => [
                'name' => 'Street X',
                'slug' => 'streetx',
            ],
            10 => [
                'name' => 'Drag',
                'slug' => 'drag',
            ],
            11 => [
                'name' => 'Sprint',
                'slug' => 'sprint',
            ],
            12 => [
                'name' => 'Info',
                'slug' => 'info',
            ],
            13 => [
                'name' => 'Bank',
                'slug' => 'bank',
            ],
        ];
        
        $layerData = [];
        foreach ($layers as $key => $layer) {
            $layersData[] = [
                "game" => 1,
                "name" => $layer['name'],
                "slug" => $layer['slug']
            ];
        }

        Layer::insert($layersData);
    }
}
