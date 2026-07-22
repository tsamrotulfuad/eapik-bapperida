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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nama_kegiatan');
            $table->text('deskripsi')->nullable();
            $table->dateTime('waktu_mulai'); // Tanggal & jam mulai
            $table->dateTime('waktu_selesai'); // Tanggal & jam selesai
            $table->foreignId('bidang_id');
            $table->foreignId('ruangan_id');
            $table->enum('status', ['terjadwal', 'berlangsung', 'selesai', 'batal'])->default('terjadwal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
