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
        Schema::create('kajians', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('judul');
            $table->string('penulis');
            $table->foreignId('bidang_id')->nullable();
            $table->year('tahun_terbit');
            $table->string('jenis');
            $table->text('abstrak')->nullable();
            $table->string('kata_kunci')->nullable();
            $table->string('file_dokumen')->nullable();
            $table->string('cover')->nullable();
            $table->enum('status', ['draft', 'internal', 'publish'])->default('draft');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kajians');
    }
};
