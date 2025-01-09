<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'id' => Str::uuid(),
                'title' => 'Aku Tak Membenci Hujan',
                'synopsis' => 'Launa, gadis cantik nan ceria, yang jatuh hati pada Karang yang ternyata memiliki kepribadian ganda. Namun, lelaki malang itu ingin membunuh sosok Karang yang ada dalam dirinya. Karang lebih memilih menjadi Banu, anak kecil atau Agha, remaja yang durhaka dan suka memberontak.',
                'poster' => 'image.jpg',
                'year' => '2024',
                'available' => true,
                'genre_id' => Genre::first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Movie::factory()->count(5)->create();
    }
}
