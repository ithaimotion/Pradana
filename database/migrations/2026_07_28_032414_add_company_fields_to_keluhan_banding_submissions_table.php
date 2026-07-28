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
        Schema::table('keluhan_banding_submissions', function (Blueprint $table) {
            $table->string('nama_perusahaan')->nullable();
            $table->string('kota')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon_perusahaan')->nullable();
            $table->string('email_perusahaan')->nullable();
            $table->string('nama_perwakilan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('telepon_perwakilan')->nullable();
            $table->string('email_perwakilan')->nullable();
            $table->string('path_dokumen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keluhan_banding_submissions', function (Blueprint $table) {
            $table->dropColumn([
                'nama_perusahaan',
                'kota',
                'alamat',
                'telepon_perusahaan',
                'email_perusahaan',
                'nama_perwakilan',
                'jabatan',
                'telepon_perwakilan',
                'email_perwakilan',
                'path_dokumen'
            ]);
        });
    }
};
