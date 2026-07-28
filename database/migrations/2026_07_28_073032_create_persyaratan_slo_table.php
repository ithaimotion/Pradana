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
        Schema::create('persyaratan_slo', function (Blueprint $table) {
            $table->id();
            
            // Tegangan Rendah
            $table->json('tr_admin')->nullable();
            $table->json('tr_teknis')->nullable();
            
            // Tegangan Menengah
            $table->json('tm_admin')->nullable();
            $table->json('tm_teknis')->nullable();
            
            // PLTS
            $table->json('plts_admin')->nullable();
            $table->json('plts_teknis')->nullable();
            
            // Genset
            $table->json('genset_admin')->nullable();
            $table->json('genset_teknis')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persyaratan_slo');
    }
};
