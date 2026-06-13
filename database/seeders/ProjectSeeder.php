<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul' => 'E-Commerce Platform',
                'deskripsi' => 'Platform e-commerce lengkap dengan fitur keranjang belanja, pembayaran, dan manajemen produk. Dibangun menggunakan Laravel dan React.',
                'link_github' => 'https://github.com/johndoe/ecommerce',
                'link_demo' => 'https://ecommerce-demo.example.com',
                'teknologi' => ['Laravel', 'React', 'MySQL', 'Tailwind CSS'],
            ],
            [
                'judul' => 'Task Management App',
                'deskripsi' => 'Aplikasi manajemen tugas dengan fitur drag-and-drop, notifikasi, dan kolaborasi tim.',
                'link_github' => 'https://github.com/johndoe/taskmanager',
                'teknologi' => ['Vue.js', 'Firebase', 'Vuetify'],
            ],
            [
                'judul' => 'Portfolio Website',
                'deskripsi' => 'Website portfolio pribadi untuk menampilkan project dan pengalaman. Dibangun dengan Laravel 12 dan Tailwind CSS.',
                'link_github' => 'https://github.com/johndoe/portfolio',
                'link_demo' => 'https://johndoe.example.com',
                'teknologi' => ['Laravel', 'Tailwind CSS', 'Alpine.js'],
            ],
        ];

        foreach ($data as $item) {
            Project::create($item);
        }
    }
}
