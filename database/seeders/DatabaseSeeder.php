<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@portfolio.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            ProfileSeeder::class,
            PengalamanSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
