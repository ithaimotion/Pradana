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
        Schema::table('profil_legalitas', function (Blueprint $table) {
            $table->string('judul')->nullable()->after('id');
            $table->text('subjudul')->nullable()->after('judul');
            $table->string('dokumen')->nullable()->after('subjudul');
            $table->text('konten')->nullable()->after('dokumen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_legalitas', function (Blueprint $table) {
            $table->dropColumn(['judul', 'subjudul', 'dokumen', 'konten']);
        });
    }
};
