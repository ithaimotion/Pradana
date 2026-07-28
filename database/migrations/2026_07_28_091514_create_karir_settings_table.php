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
        Schema::create('karir_settings', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->json('benefits')->nullable();
            $table->string('years_experience')->default('10+');
            $table->string('projects_completed')->default('500+');
            $table->string('team_professionals')->default('50+');
            $table->string('cities_served')->default('30+');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karir_settings');
    }
};
