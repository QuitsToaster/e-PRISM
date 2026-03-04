<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('attachments', function (Blueprint $table) {
        $table->text('admin_feedback')->nullable();
        $table->string('review_status')->default('Pending');
    });
}

public function down()
{
    Schema::table('attachments', function (Blueprint $table) {
        $table->dropColumn(['admin_feedback', 'review_status']);
    });
}
};
