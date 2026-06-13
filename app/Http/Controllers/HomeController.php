<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Pengalaman;
use App\Models\Project;
use App\Models\Pendidikan;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first() ?? new Profile();
        $pengalamans = Pengalaman::orderBy('tanggal_mulai', 'desc')->limit(3)->get();
        $projects = Project::orderBy('created_at', 'desc')->limit(3)->get();
        $pendidikans = Pendidikan::orderBy('tahun_mulai', 'asc')->get();

        return view('welcome', compact('profile', 'pengalamans', 'projects', 'pendidikans'));
    }
}
