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
        Schema::table('eleveorientes', function (Blueprint $table) {
            $table->foreign(['classroom_id'], 'class_ori')->references(['id'])->on('classrooms')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['eleve_id'], 'elev_ori')->references(['id'])->on('eleves')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['filiere_id'], 'fil_ori')->references(['id'])->on('filieres')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['serie_id'], 'seri_ori')->references(['id'])->on('series')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['academie_id'], 'acade_orie')->references(['id'])->on('academies')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['cycle_id'], 'cyc_ori')->references(['id'])->on('cycles')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['etablissement_id'], 'etab_ori')->references(['id'])->on('etablissements')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['orientation_id'], 'ori_ori')->references(['id'])->on('orientations')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eleveorientes', function (Blueprint $table) {
            $table->dropForeign('class_ori');
            $table->dropForeign('elev_ori');
            $table->dropForeign('fil_ori');
            $table->dropForeign('seri_ori');
            $table->dropForeign('acade_orie');
            $table->dropForeign('cyc_ori');
            $table->dropForeign('etab_ori');
            $table->dropForeign('ori_ori');
        });
    }
};
