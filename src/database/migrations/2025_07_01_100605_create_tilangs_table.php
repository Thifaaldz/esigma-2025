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
        Schema::create('tilangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kendaraan_id')->constrained()->onDelete('cascade');
            $table->foreignId('petugas_id')->constrained('users')->onDelete('cascade');
            $table->string('jenis_pelanggaran');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_pelanggaran');
            $table->string('lokasi');
            $table->enum('status', ['Belum Diverifikasi', 'Terverifikasi', 'Ditolak'])->default('Belum Diverifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tilangs');
    }
};
