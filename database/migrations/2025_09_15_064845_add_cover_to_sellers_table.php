<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('sellers', function (Blueprint $table) {
        $table->string('cover')->nullable()->after('profile_picture');
    });
}

public function down()
{
    Schema::table('sellers', function (Blueprint $table) {
        $table->dropColumn('cover');
    });
}

};
