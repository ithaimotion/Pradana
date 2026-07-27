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
        Schema::create('profil_legalitas_tenaga_teknik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_legalitas_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('no_sertifikat')->nullable();
            $table->string('bidang_kompetensi')->nullable();
            $table->string('status')->default('Aktif');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_legalitas_tenaga_teknik');
    }
};
