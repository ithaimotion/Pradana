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
        Schema::create('profil_daftar_p_j_t_t_t_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('profil_daftar_p_j_t_t_t_id')
                ->constrained('profil_daftar_p_j_t_t_t_s')
                ->cascadeOnDelete();

            $table->string('kategori');
            // contoh:
            // Instalasi Pemanfaatan Tenaga Listrik Tegangan Menengah
            // Pembangkit Listrik Tenaga Diesel

            $table->string('nama');

            $table->enum('jabatan', [
                'PJT',
                'TT'
            ]);

            $table->string('no_sertifikat');
            $table->string('no_register');

            $table->integer('urutan')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_daftar_p_j_t_t_t_items');
    }
};
