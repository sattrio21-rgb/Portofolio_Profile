<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;

// Halaman Publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pengalaman', [PengalamanController::class, 'index'])->name('pengalaman');
Route::get('/pengalaman/hima', [PengalamanController::class, 'hima'])->name('pengalaman.hima');
Route::get('/pengalaman/bem', [PengalamanController::class, 'bem'])->name('pengalaman.bem');
Route::get('/project', [ProjectController::class, 'index'])->name('project');

// Admin (butuh login)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Edit Profil
    Route::get('/edit-profil', [PortfolioController::class, 'editProfil'])->name('edit-profil');
    Route::put('/edit-profil', [PortfolioController::class, 'updateProfile'])->name('edit-profil.update');

    // Edit Pengalaman
    Route::get('/edit-pengalaman', [PortfolioController::class, 'editPengalaman'])->name('edit-pengalaman');
    Route::put('/edit-pengalaman/foto-organisasi', [PortfolioController::class, 'updateFotoOrganisasi'])->name('edit-pengalaman.foto-organisasi.update');
    Route::post('/edit-pengalaman', [PortfolioController::class, 'storePengalaman'])->name('edit-pengalaman.store');
    Route::put('/edit-pengalaman/{pengalaman}', [PortfolioController::class, 'updatePengalaman'])->name('edit-pengalaman.update');
    Route::delete('/edit-pengalaman/{pengalaman}', [PortfolioController::class, 'destroyPengalaman'])->name('edit-pengalaman.destroy');

    // Edit Project
    Route::get('/edit-project', [PortfolioController::class, 'editProject'])->name('edit-project');
    Route::post('/edit-project', [PortfolioController::class, 'storeProject'])->name('edit-project.store');
    Route::put('/edit-project/{project}', [PortfolioController::class, 'updateProject'])->name('edit-project.update');
    Route::delete('/edit-project/{project}', [PortfolioController::class, 'destroyProject'])->name('edit-project.destroy');
});

// Auth routes dari Breeze (user profile edit)
Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::patch('/user/profile', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('user.profile.destroy');
});

// Auth routes (login, register, dll)
require __DIR__.'/auth.php';
