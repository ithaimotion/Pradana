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
        Schema::create('prosedur_slo', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokumen');
            $table->string('path_pdf')->nullable();
            $table->boolean('is_active')->default(true);
            
            // Timeline steps
            $table->json('timeline_steps')->nullable();
            
            // Accordion content
            $table->json('accordion_content')->nullable();
            
            // Processing time
            $table->json('processing_time')->nullable();
            
            // Required documents
            $table->json('required_documents')->nullable();
            
            // FAQ
            $table->json('faq_content')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prosedur_slo');
    }
};
