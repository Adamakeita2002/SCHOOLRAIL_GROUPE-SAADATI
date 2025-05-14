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
        Schema::table('pp_strategies', function (Blueprint $table) {
            $table->foreign(['objspecifique_id'], 'obj_stra')->references(['id'])->on('pp_objspecifiques')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pp_strategies', function (Blueprint $table) {
            $table->dropForeign('obj_stra');
        });
    }
};
