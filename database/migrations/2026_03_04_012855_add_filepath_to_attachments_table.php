<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('attachments', function (Blueprint $table) {
        $table->string('filepath')->after('filename'); // adjust after which column if needed
    });
}

public function down()
{
    Schema::table('attachments', function (Blueprint $table) {
        $table->dropColumn('filepath');
    });
}
};
