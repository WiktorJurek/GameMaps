<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::truncate();

        $gameData = [
            'name' => 'Need for Speed Underground 2',
            'slug' => 'nfs-underground-2'
        ];

        Game::insert($gameData);
    }
}
