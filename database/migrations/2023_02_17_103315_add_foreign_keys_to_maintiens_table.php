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
        Schema::table('maintiens', function (Blueprint $table) {
            $table->foreign(['anneesco_id'], 'ann_main')->references(['id'])->on('anneescos')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maintiens', function (Blueprint $table) {
            $table->dropForeign('ann_main');
        });
    }
};
