<?php

namespace Database\Seeders;

use App\Models\Cast;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Cast_MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cast_movies')->insert([
            [
                'id' => Str::uuid(),
                'movie_id' => Movie::first()->id,
                'cast_id' => Cast::first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Movie::factory()->count(5)->create();
    }
}
