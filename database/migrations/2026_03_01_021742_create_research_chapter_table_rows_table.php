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
        Schema::create('research_chapter_table_rows', function (Blueprint $table) {
    $table->id();
    $table->foreignId('research_chapter_table_id')->constrained()->cascadeOnDelete();
    $table->json('cells');
    $table->decimal('row_total', 12, 2)->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_chapter_table_rows');
    }
};
