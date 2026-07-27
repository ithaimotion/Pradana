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
        Schema::create('profil_struktur_organisasis', function (Blueprint $table) {
            $table->id();

            $table->string('judul');
            $table->text('subjudul')->nullable();
            $table->longText('konten')->nullable();

            $table->string('gambar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_struktur_organisasis');
    }
};
