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
        Schema::table('menu_structure', function (Blueprint $table) {
            $table->foreign(['structure_id'], 'str_structure')->references(['id'])->on('structures')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['menu_id'], 'men_menu')->references(['id'])->on('menus')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_structure', function (Blueprint $table) {
            $table->dropForeign('str_structure');
            $table->dropForeign('men_menu');
        });
    }
};
