<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
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
