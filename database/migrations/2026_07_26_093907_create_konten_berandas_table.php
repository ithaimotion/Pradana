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
        Schema::create('konten_beranda', function (Blueprint $table) {
            $table->id();
            $table->string('bagian'); // hero, statistik, keunggulan, galeri, dll.
            $table->string('kunci')->nullable(); // misal 'title', 'subtitle', 'bg_image'
            $table->string('judul')->nullable();
            $table->text('subjudul')->nullable();
            $table->text('konten')->nullable();
            $table->string('path_gambar')->nullable();
            $table->string('ikon')->nullable();
            $table->string('nilai')->nullable(); // contoh angka statistik: '15+', '100%'
            $table->integer('urutan')->default(0);
            $table->boolean('status_aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten_beranda');
    }
};
