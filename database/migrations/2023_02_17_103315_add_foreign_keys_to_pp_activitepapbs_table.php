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
        Schema::table('pp_activitepapbs', function (Blueprint $table) {
            $table->foreign(['strategie_id'], 'act_stra')->references(['id'])->on('pp_strategies')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pp_activitepapbs', function (Blueprint $table) {
            $table->dropForeign('act_stra');
        });
    }
};
