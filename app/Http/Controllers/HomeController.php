<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Pengalaman;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first() ?? new Profile();
        $pengalamans = Pengalaman::orderBy('tanggal_mulai', 'desc')->limit(3)->get();
        $projects = Project::orderBy('created_at', 'desc')->limit(3)->get();

        return view('welcome', compact('profile', 'pengalamans', 'projects'));
    }
}
