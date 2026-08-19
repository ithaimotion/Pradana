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
        Schema::table('persyaratan_slo', function (Blueprint $table) {
            $table->renameColumn('genset_admin', 'pltd_admin');
            $table->renameColumn('genset_teknis', 'pltd_teknis');
            $table->renameColumn('tr_admin', 'distribusi_admin');
            $table->renameColumn('tr_teknis', 'distribusi_teknis');
            $table->renameColumn('tm_admin', 'iptl_tm_admin');
            $table->renameColumn('tm_teknis', 'iptl_tm_teknis');
            
            $table->dropColumn('iptl_tm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('persyaratan_slo', function (Blueprint $table) {
            $table->renameColumn('pltd_admin', 'genset_admin');
            $table->renameColumn('pltd_teknis', 'genset_teknis');
            $table->renameColumn('distribusi_admin', 'tr_admin');
            $table->renameColumn('distribusi_teknis', 'tr_teknis');
            $table->renameColumn('iptl_tm_admin', 'tm_admin');
            $table->renameColumn('iptl_tm_teknis', 'tm_teknis');
            
            $table->json('iptl_tm')->nullable();
        });
    }
};
