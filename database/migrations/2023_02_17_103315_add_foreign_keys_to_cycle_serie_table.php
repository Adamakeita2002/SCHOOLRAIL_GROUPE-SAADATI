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
        Schema::table('cycle_serie', function (Blueprint $table) {
            $table->foreign(['serie_id'], 'ser_serie')->references(['id'])->on('series')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['cycle_id'], 'cyc_cycle')->references(['id'])->on('cycles')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cycle_serie', function (Blueprint $table) {
            $table->dropForeign('ser_serie');
            $table->dropForeign('cyc_cycle');
        });
    }
};
