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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('nopol')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->enum('jenis_roda', ['2', '4']);
            $table->string('merek');
            $table->string('tipe');
            $table->string('tahun_pembuatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
