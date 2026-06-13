<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $table = 'pengalamans';

    protected $fillable = [
        'nama_organisasi',
        'jabatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
        'foto',
        'kategori',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
}
