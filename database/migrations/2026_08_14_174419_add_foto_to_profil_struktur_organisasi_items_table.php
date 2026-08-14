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
        Schema::table('profil_struktur_organisasi_items', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('profil_struktur_organisasi_id');
            $table->string('nama')->nullable()->change();
            $table->string('jabatan')->nullable()->change();
            $table->integer('level')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_struktur_organisasi_items', function (Blueprint $table) {
            $table->dropColumn('foto');
            $table->string('nama')->nullable(false)->change();
            $table->string('jabatan')->nullable(false)->change();
            $table->integer('level')->nullable(false)->change();
        });
    }
};
