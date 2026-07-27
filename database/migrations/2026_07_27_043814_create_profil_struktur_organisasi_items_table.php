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
            Schema::create('profil_struktur_organisasi_items', function (Blueprint $table) {
                $table->id();

                $table->foreignId('profil_struktur_organisasi_id')
                    ->constrained('profil_struktur_organisasis', 'id', 'struktur_org_items_struktur_id')
                    ->cascadeOnDelete();
                $table->string('nama');
                $table->string('jabatan');
                $table->string('divisi')->nullable();
                $table->integer('level');
                $table->integer('urutan')->default(0);
                $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_struktur_organisasi_items');
    }
};
