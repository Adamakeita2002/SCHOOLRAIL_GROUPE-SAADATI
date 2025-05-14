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
        Schema::table('pp_orsis', function (Blueprint $table) {
            $table->foreign(['objspecifique_id'], 'objk_ors')->references(['id'])->on('pp_objspecifiques')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['sourcevef_id'], 'sourk_ors')->references(['id'])->on('pp_sourcevefs')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['strategie_id'], 'str_ors')->references(['id'])->on('pp_strategies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['indicateur_id'], 'indk_ors')->references(['id'])->on('pp_indicateurs')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['resultat_id'], 'resk_ors')->references(['id'])->on('pp_resultats')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['sousprogramme_id'], 'souspk_ors')->references(['id'])->on('pp_sousprogrammes')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pp_orsis', function (Blueprint $table) {
            $table->dropForeign('objk_ors');
            $table->dropForeign('sourk_ors');
            $table->dropForeign('str_ors');
            $table->dropForeign('indk_ors');
            $table->dropForeign('resk_ors');
            $table->dropForeign('souspk_ors');
        });
    }
};
