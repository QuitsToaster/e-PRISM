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
        Schema::create('research_chapter_tables', function (Blueprint $table) {
    $table->id();
    $table->foreignId('research_chapter_id')->constrained()->cascadeOnDelete();
    $table->json('headers'); // STORE HEADERS
    $table->boolean('has_total')->default(false);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_chapter_tables');
    }
};
