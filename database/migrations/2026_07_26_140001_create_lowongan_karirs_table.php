<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lowongan_karirs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('divisi')->default('Teknik');
            $table->string('tipe')->default('Full Time');
            $table->string('lokasi')->default('Jakarta');
            $table->text('deskripsi')->nullable();
            $table->text('persyaratan')->nullable();
            $table->string('link_lamar')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lowongan_karirs');
    }
};
