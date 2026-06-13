<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('judul_hima')->nullable()->after('foto_hima')->default('HIMA');
            $table->string('deskripsi_hima')->nullable()->after('judul_hima')->default('Himpunan Mahasiswa Informatika');
            $table->string('judul_bem')->nullable()->after('deskripsi_hima')->default('BEM');
            $table->string('deskripsi_bem')->nullable()->after('judul_bem')->default('Badan Eksekutif Mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['judul_hima', 'deskripsi_hima', 'judul_bem', 'deskripsi_bem']);
        });
    }
};
