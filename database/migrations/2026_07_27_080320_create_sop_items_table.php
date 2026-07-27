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
        Schema::create('sop_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_sop_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('kategori')->nullable()->comment('mutu, inspeksi, pelayanan, sdm');
            $table->string('kode')->nullable()->comment('SOP-MM-001, SOP-INS-001, dll');
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('revisi')->nullable()->comment('Jan 2026 · Rev.05');
            $table->string('url_dokumen')->nullable();
            $table->integer('urutan')->nullable()->default(0);
            $table->boolean('status_aktif')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sop_items');
    }
};
