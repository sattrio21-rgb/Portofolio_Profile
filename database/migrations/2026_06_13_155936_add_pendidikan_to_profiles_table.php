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
            $table->string('nama_institusi')->nullable()->after('deskripsi');
            $table->string('jurusan')->nullable()->after('nama_institusi');
            $table->string('tahun_mulai_pendidikan')->nullable()->after('jurusan');
            $table->string('tahun_selesai_pendidikan')->nullable()->after('tahun_mulai_pendidikan');
            $table->text('deskripsi_pendidikan')->nullable()->after('tahun_selesai_pendidikan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['nama_institusi', 'jurusan', 'tahun_mulai_pendidikan', 'tahun_selesai_pendidikan', 'deskripsi_pendidikan']);
        });
    }
};
