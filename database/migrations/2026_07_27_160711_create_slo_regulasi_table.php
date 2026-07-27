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
        Schema::create('slo_regulasi', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');                        // e.g. "Permen No. 12 Tahun 2021"
            $table->text('keterangan');                     // Deskripsi lengkap regulasi
            $table->string('tipe')->default('permen_esdm'); // Kategori: uu_pp / permen_esdm / sni
            $table->string('url_dokumen')->nullable();      // Link lihat dokumen eksternal
            $table->unsignedTinyInteger('urutan')->default(0); // Urutan tampil
            $table->boolean('is_active')->default(true);   // Tampilkan atau sembunyikan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slo_regulasi');
    }
};
