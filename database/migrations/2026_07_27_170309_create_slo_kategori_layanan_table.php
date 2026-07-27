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
        Schema::create('slo_kategori_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_utama'); // TR or TM
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('ikon')->nullable(); // emoji
            $table->json('tags')->nullable(); // array of tags
            $table->unsignedTinyInteger('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slo_kategori_layanan');
    }
};
