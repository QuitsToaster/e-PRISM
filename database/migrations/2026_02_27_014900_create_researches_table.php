<?php

// database/migrations/xxxx_create_researches_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('researches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('classification'); // proposal or completed
            $table->string('research_type'); // action or basic
            $table->string('school');
            $table->string('school_id')->nullable();
            $table->string('title');
            $table->json('chapters')->nullable(); // store chapters as JSON
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('researches');
    }
};