<?php

namespace Database\Seeders;

use App\Models\Pengalaman;
use Illuminate\Database\Seeder;

class PengalamanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_organisasi' => 'Himpunan Mahasiswa Informatika',
                'jabatan' => 'Ketua Divisi IT',
                'tanggal_mulai' => '2024-01-01',
                'tanggal_selesai' => '2024-12-31',
                'deskripsi' => 'Memimpin divisi IT dalam mengembangkan sistem informasi himpunan mahasiswa dan mengelola website organisasi.',
                'kategori' => 'hima',
            ],
            [
                'nama_organisasi' => 'Google Developer Student Club',
                'jabatan' => 'Core Team - Web Development',
                'tanggal_mulai' => '2023-09-01',
                'tanggal_selesai' => '2024-06-30',
                'deskripsi' => 'Bertanggung jawab dalam mengadakan workshop dan bootcamp web development untuk mahasiswa.',
                'kategori' => 'hima',
            ],
            [
                'nama_organisasi' => 'BEM Fakultas Teknik',
                'jabatan' => 'Kepala Departemen PSDM',
                'tanggal_mulai' => '2024-01-01',
                'tanggal_selesai' => '2024-12-31',
                'deskripsi' => 'Mengelola program pengembangan sumber daya mahasiswa dan mengadakan kegiatan kepemimpinan.',
                'kategori' => 'bem',
            ],
            [
                'nama_organisasi' => 'BEM Universitas',
                'jabatan' => 'Staff Hubungan Internal',
                'tanggal_mulai' => '2023-08-01',
                'tanggal_selesai' => '2024-07-31',
                'deskripsi' => 'Menjalin koordinasi antar organisasi kemahasiswaan dan mengadakan dialog bersama rektorat.',
                'kategori' => 'bem',
            ],
        ];

        foreach ($data as $item) {
            Pengalaman::create($item);
        }
    }
}
