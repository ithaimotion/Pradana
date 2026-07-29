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
        Schema::table('konten_beranda', function (Blueprint $table) {
            $table->string('path_gambar_2')->nullable()->after('path_gambar');
            $table->string('path_gambar_3')->nullable()->after('path_gambar_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konten_beranda', function (Blueprint $table) {
            $table->dropColumn(['path_gambar_2', 'path_gambar_3']);
        });
    }
};
