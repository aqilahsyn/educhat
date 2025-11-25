<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
    $table->id();
    $table->foreignId('clo_id')->constrained()->onDelete('cascade');
    $table->string('title');                // judul materi
    $table->text('description')->nullable();// ringkasan materi
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
