<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
        'nama_institusi',
        'jurusan',
        'tahun_mulai_pendidikan',
        'tahun_selesai_pendidikan',
        'deskripsi_pendidikan',
        'foto_hima',
        'judul_hima',
        'deskripsi_hima',
        'foto_bem',
        'judul_bem',
        'deskripsi_bem',
        'email',
        'no_hp',
        'instagram',
        'linkedin',
        'github',
    ];
}
