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
        Schema::table('elevemaintenus', function (Blueprint $table) {
            $table->foreign(['classroom_id'], 'class_room')->references(['id'])->on('classrooms')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['eleve_id'], 'ele_ve')->references(['id'])->on('eleves')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['filiere_id'], 'fili_fili')->references(['id'])->on('filieres')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['serie_id'], 'serr_serie')->references(['id'])->on('series')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['academie_id'], 'acad_acad')->references(['id'])->on('academies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['cycle_id'], 'cyccc_cycle')->references(['id'])->on('cycles')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['etablissement_id'], 'etab_etab')->references(['id'])->on('etablissements')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['maintien_id'], 'main_main')->references(['id'])->on('maintiens')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('elevemaintenus', function (Blueprint $table) {
            $table->dropForeign('class_room');
            $table->dropForeign('ele_ve');
            $table->dropForeign('fili_fili');
            $table->dropForeign('serr_serie');
            $table->dropForeign('acad_acad');
            $table->dropForeign('cyccc_cycle');
            $table->dropForeign('etab_etab');
            $table->dropForeign('main_main');
        });
    }
};
