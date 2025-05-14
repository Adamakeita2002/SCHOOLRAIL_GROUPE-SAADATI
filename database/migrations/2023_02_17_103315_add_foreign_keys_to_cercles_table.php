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
        Schema::table('cercles', function (Blueprint $table) {
            $table->foreign(['region_id'], 'reg_cer')->references(['id'])->on('regions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cercles', function (Blueprint $table) {
            $table->dropForeign('reg_cer');
        });
    }
};
