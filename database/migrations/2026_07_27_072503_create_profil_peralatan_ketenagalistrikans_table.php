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
        Schema::create('profil_peralatan_ketenagalistrikans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('kategori')->nullable()->comment('ukur, uji, safety');
            $table->string('gambar')->nullable();
            $table->text('deskripsi_singkat')->nullable();
            $table->string('jenis_alat')->nullable();
            $table->string('model')->nullable();
            $table->json('spesifikasi')->nullable();
            $table->string('status_kalibrasi')->nullable();
            $table->date('tanggal_kalibrasi')->nullable();
            $table->integer('urutan')->nullable()->default(0);
            $table->boolean('status_aktif')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_peralatan_ketenagalistrikans');
    }
};
