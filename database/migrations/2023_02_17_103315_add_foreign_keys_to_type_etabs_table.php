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
        Schema::table('type_etabs', function (Blueprint $table) {
            $table->foreign(['ordre_id'], 'ordre_typeEtab')->references(['id'])->on('ordres')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('type_etabs', function (Blueprint $table) {
            $table->dropForeign('ordre_typeEtab');
        });
    }
};
