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
        Schema::table('transferts', function (Blueprint $table) {
            $table->foreign(['anneesco_id'], 'anneesco_trans')->references(['id'])->on('anneescos')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transferts', function (Blueprint $table) {
            $table->dropForeign('anneesco_trans');
        });
    }
};
