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
        Schema::table('elevesitactus', function (Blueprint $table) {
            $table->foreign(['classroom_id'], 'class_sit')->references(['id'])->on('classrooms')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['eleve_id'], 'elev_sit')->references(['id'])->on('eleves')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['filiere_id'], 'fil_sit')->references(['id'])->on('filieres')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['personel_id'], 'personel_id')->references(['id'])->on('personels');
            $table->foreign(['academie_id'], 'aca_sit')->references(['id'])->on('academies');
            $table->foreign(['cycle_id'], 'cyc_sit')->references(['id'])->on('cycles')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['etablissement_id'], 'etab_sit')->references(['id'])->on('etablissements')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['maintien_id'], 'main_sit')->references(['id'])->on('maintiens')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['serie_id'], 'serie_sit')->references(['id'])->on('series')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('elevesitactus', function (Blueprint $table) {
            $table->dropForeign('class_sit');
            $table->dropForeign('elev_sit');
            $table->dropForeign('fil_sit');
            $table->dropForeign('personel_id');
            $table->dropForeign('aca_sit');
            $table->dropForeign('cyc_sit');
            $table->dropForeign('etab_sit');
            $table->dropForeign('main_sit');
            $table->dropForeign('serie_sit');
        });
    }
};
