<?php

namespace Database\Seeders;

use App\Models\Cast;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('casts')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'aisyah',
                'age' => 20,
                'biodata' => 'artis',
                'avatar' => 'image.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Cast::factory()->count(5)->create();
    }
}
