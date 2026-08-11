<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            $table->string('foto_visi')->nullable()->after('visi');
            $table->string('foto_misi')->nullable()->after('misi');
        });
    }

    public function down(): void
    {
        Schema::table('profil_perusahaan', function (Blueprint $table) {
            $table->dropColumn(['foto_visi', 'foto_misi']);
        });
    }
};
