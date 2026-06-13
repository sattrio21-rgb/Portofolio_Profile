<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Pengalaman;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $profile = Profile::first() ?? new Profile();
        $totalPengalaman = Pengalaman::count();
        $totalProject = Project::count();

        return view('admin.dashboard', compact('profile', 'totalPengalaman', 'totalProject'));
    }
}
