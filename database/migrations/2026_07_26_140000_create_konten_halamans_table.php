<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konten_halamans', function (Blueprint $table) {
            $table->id();
            $table->string('halaman')->index(); // e.g., 'profil_perusahaan', 'slo_regulasi', etc.
            $table->string('kunci')->index();   // e.g., 'header', 'item_1', 'section_sop'
            $table->string('judul')->nullable();
            $table->text('subjudul')->nullable();
            $table->longText('konten')->nullable();
            $table->text('nilai')->nullable();
            $table->string('path_gambar')->nullable();
            $table->string('path_dokumen')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konten_halamans');
    }
};
