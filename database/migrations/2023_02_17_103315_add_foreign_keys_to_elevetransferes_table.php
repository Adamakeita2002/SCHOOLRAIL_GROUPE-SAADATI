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
        Schema::table('elevetransferes', function (Blueprint $table) {
            $table->foreign(['classroom_id'], 'clas_transf')->references(['id'])->on('classrooms')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['eleve_id'], 'elev_transf')->references(['id'])->on('eleves')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['filiere_id'], 'file_trans')->references(['id'])->on('filieres')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['transfert_id'], 'trans_transf')->references(['id'])->on('transferts')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['academie_id'], 'acade_transf')->references(['id'])->on('academies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['cycle_id'], 'cycle_transf')->references(['id'])->on('cycles')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['etablissement_id'], 'etab_transf')->references(['id'])->on('etablissements')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['serie_id'], 'serie_transf')->references(['id'])->on('series')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('elevetransferes', function (Blueprint $table) {
            $table->dropForeign('clas_transf');
            $table->dropForeign('elev_transf');
            $table->dropForeign('file_trans');
            $table->dropForeign('trans_transf');
            $table->dropForeign('acade_transf');
            $table->dropForeign('cycle_transf');
            $table->dropForeign('etab_transf');
            $table->dropForeign('serie_transf');
        });
    }
};
