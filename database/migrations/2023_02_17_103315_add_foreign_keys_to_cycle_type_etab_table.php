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
        Schema::table('cycle_type_etab', function (Blueprint $table) {
            $table->foreign(['type_etab_id'], 'type_etab_cycle')->references(['id'])->on('type_etabs')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['cycle_id'], 'cycle_type_etab')->references(['id'])->on('cycles')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cycle_type_etab', function (Blueprint $table) {
            $table->dropForeign('type_etab_cycle');
            $table->dropForeign('cycle_type_etab');
        });
    }
};
