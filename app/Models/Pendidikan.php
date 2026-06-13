<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikans';

    protected $fillable = [
        'nama_institusi',
        'jurusan',
        'tahun_mulai',
        'tahun_selesai',
        'deskripsi',
    ];
}
