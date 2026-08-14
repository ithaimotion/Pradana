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
        Schema::create('informasi_kontak_settings', function (Blueprint $table) {
            $table->id();
            $table->text('alamat_kantor')->nullable();
            $table->string('telepon_whatsapp')->nullable();
            $table->string('email_resmi')->nullable();
            $table->string('jam_operasional')->nullable();
            $table->text('embed_maps')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_kontak_settings');
    }
};
