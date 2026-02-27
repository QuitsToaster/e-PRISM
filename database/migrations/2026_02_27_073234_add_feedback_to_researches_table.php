<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up() {
    Schema::table('researches', function (Blueprint $table) {
        $table->text('feedback')->nullable()->after('status');
    });
}

public function down() {
    Schema::table('researches', function (Blueprint $table) {
        $table->dropColumn('feedback');
    });
}
};
