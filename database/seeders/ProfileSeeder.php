<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'nama' => 'John Doe',
            'deskripsi' => 'Mahasiswa Informatika yang passionate dalam web development dan UI/UX design. Suka belajar teknologi baru dan berkontribusi dalam proyek open source.',
            'email' => 'john@example.com',
            'no_hp' => '08123456789',
            'instagram' => 'https://instagram.com/johndoe',
            'linkedin' => 'https://linkedin.com/in/johndoe',
            'github' => 'https://github.com/johndoe',
        ]);
    }
}
