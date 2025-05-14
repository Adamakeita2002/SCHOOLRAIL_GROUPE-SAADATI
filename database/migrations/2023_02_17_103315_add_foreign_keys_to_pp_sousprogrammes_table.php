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
        Schema::table('pp_sousprogrammes', function (Blueprint $table) {
            $table->foreign(['pp_programme_id'], 'sprk_pro')->references(['id'])->on('pp_programmes')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pp_sousprogrammes', function (Blueprint $table) {
            $table->dropForeign('sprk_pro');
        });
    }
};
