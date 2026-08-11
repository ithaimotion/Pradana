<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('persyaratan_slo', function (Blueprint $table) {
            $table->json('iptl_tm')->nullable()->after('genset_teknis');
        });
    }

    public function down(): void
    {
        Schema::table('persyaratan_slo', function (Blueprint $table) {
            $table->dropColumn('iptl_tm');
        });
    }
};
