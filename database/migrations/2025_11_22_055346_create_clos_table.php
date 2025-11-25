
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clos', function (Blueprint $table) {
    $table->id();
    $table->foreignId('course_id')->constrained()->onDelete('cascade');
    $table->string('title');            // "CLO 1" / "CLO 3 – Strategi Algoritma"
    $table->text('description');        // deskripsi CLO
    $table->text('summary')->nullable();// ringkasan materi CLO (edit dosen)
    $table->unsignedInteger('order')->default(1);
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('clos');
    }
};
