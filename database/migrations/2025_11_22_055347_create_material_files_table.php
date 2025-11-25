<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('material_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained()->onDelete('cascade');
            $table->string('pdf_path')->nullable(); // file lokal
            $table->string('pdf_url')->nullable();  // link luar
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('material_files');
    }
};
