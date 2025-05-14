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
        Schema::table('caps', function (Blueprint $table) {
            $table->foreign(['academie_id'], 'aca_cap')->references(['id'])->on('academies')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caps', function (Blueprint $table) {
            $table->dropForeign('aca_cap');
        });
    }
};
