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
        Schema::table('profil_legalitas_items', function (Blueprint $table) {
            $table->foreignId('profil_legalitas_id')->nullable()->constrained()->onDelete('cascade')->after('id');
            $table->string('kategori')->nullable()->after('profil_legalitas_id');
            $table->string('nama_dokumen')->nullable()->after('kategori');
            $table->string('nomor')->nullable()->after('nama_dokumen');
            $table->string('penerbit')->nullable()->after('nomor');
            $table->date('tanggal_terbit')->nullable()->after('penerbit');
            $table->date('berlaku_sampai')->nullable()->after('tanggal_terbit');
            $table->string('status')->default('Aktif')->after('berlaku_sampai');
            $table->text('deskripsi')->nullable()->after('status');
            $table->string('file')->nullable()->after('deskripsi');
            $table->integer('urutan')->default(0)->after('file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_legalitas_items', function (Blueprint $table) {
            $table->dropForeign(['profil_legalitas_id']);
            $table->dropColumn(['profil_legalitas_id', 'kategori', 'nama_dokumen', 'nomor', 'penerbit', 'tanggal_terbit', 'berlaku_sampai', 'status', 'deskripsi', 'file', 'urutan']);
        });
    }
};
