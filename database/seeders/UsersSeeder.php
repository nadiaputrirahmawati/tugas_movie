<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultRole = Roles::first();
        if (!$defaultRole) {
            $this->command->error('Tidak Ada Role Default');
            return;
        }
        User::create([
            'id' => Str::uuid(),
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'email_verified_at' => now(),
            'role_id' => $defaultRole->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory()->count(5)->create();
    }
}
