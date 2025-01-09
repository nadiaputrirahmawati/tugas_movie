<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'id' => Str::uuid(),
                'review' => 'Aku Tak Membenci Hujan',
                'rating' => 5,
                'user_id' => User::first()->id,
                'movie_id' => Movie::first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Movie::factory()->count(5)->create();
    }
}
