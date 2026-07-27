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
        Schema::create('profil_daftar_p_j_t_t_t_s', function (Blueprint $table) {
            $table->id();

            $table->string('judul');
            $table->text('subjudul')->nullable();
            $table->longText('konten')->nullable();

            $table->string('dokumen')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_daftar_p_j_t_t_t_s');
    }
};
