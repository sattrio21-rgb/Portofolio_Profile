<?php

namespace App\Http\Controllers;

use App\Models\Pengalaman;
use App\Models\Profile;

class PengalamanController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('pengalaman.index', compact('profile'));
    }

    public function hima()
    {
        $profile = Profile::first();
        $pengalamans = Pengalaman::where('kategori', 'hima')
            ->orderBy('tanggal_mulai', 'desc')
            ->get();
        return view('pengalaman.hima', compact('pengalamans', 'profile'));
    }

    public function bem()
    {
        $profile = Profile::first();
        $pengalamans = Pengalaman::where('kategori', 'bem')
            ->orderBy('tanggal_mulai', 'desc')
            ->get();
        return view('pengalaman.bem', compact('pengalamans', 'profile'));
    }
}
