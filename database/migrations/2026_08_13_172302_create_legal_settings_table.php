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
        Schema::create('legal_settings', function (Blueprint $table) {
            $table->id();
            $table->string('kebijakan_privasi_judul')->nullable();
            $table->text('kebijakan_privasi_konten')->nullable();
            $table->string('syarat_ketentuan_judul')->nullable();
            $table->text('syarat_ketentuan_konten')->nullable();
            $table->string('kebijakan_cookie_judul')->nullable();
            $table->text('kebijakan_cookie_konten')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_settings');
    }
};
