<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('music', function (Blueprint $table) {
        $table->string('genre')->after('artist');
    });
}

public function down()
{
    Schema::table('music', function (Blueprint $table) {
        $table->dropColumn('genre');
    });
}
};
