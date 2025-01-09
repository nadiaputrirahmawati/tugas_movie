<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            [
                'id' => Str::uuid(),
                'biodata' => 'saya seorang mahasiswa',
                'age' => 10,
                'address' => 'sukabumi, jawa barat',
                'avatar' => 'image.png',
                'user_id' => User::first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
        Profile::factory()->count(5)->create();
    }
}
