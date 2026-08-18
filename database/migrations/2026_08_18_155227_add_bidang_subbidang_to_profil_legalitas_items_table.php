<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_legalitas_items', function (Blueprint $table) {
            $table->string('bidang')->nullable()->after('nomor');
            $table->string('sub_bidang')->nullable()->after('bidang');
            $table->string('no_sertifikat')->nullable()->after('sub_bidang');
            $table->string('no_registrasi')->nullable()->after('no_sertifikat');
        });
    }

    public function down(): void
    {
        Schema::table('profil_legalitas_items', function (Blueprint $table) {
            $table->dropColumn(['bidang', 'sub_bidang', 'no_sertifikat', 'no_registrasi']);
        });
    }
};
