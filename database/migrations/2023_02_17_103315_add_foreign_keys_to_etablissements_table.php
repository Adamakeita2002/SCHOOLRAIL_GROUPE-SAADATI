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
        Schema::table('etablissements', function (Blueprint $table) {
            $table->foreign(['commune_id'], 'com_etab')->references(['id'])->on('communes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['academie_id'], 'ae_etab')->references(['id'])->on('academies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['type_etab_id'], 'type_etab')->references(['id'])->on('type_etabs')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etablissements', function (Blueprint $table) {
            $table->dropForeign('com_etab');
            $table->dropForeign('ae_etab');
            $table->dropForeign('type_etab');
        });
    }
};
