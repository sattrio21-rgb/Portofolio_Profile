<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'link_github',
        'link_demo',
        'teknologi',
    ];

    protected $casts = [
        'teknologi' => 'array',
    ];
}
