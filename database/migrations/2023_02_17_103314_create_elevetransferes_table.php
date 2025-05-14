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
        Schema::create('elevetransferes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('eleve_id')->nullable()->index('ele_ve');
            $table->integer('etab_maintien');
            $table->integer('etablissement_id')->nullable()->index('etab_etab');
            $table->integer('cycle_id')->nullable()->index('cyccc_cycle');
            $table->integer('serie_id')->nullable()->index('serr_serie');
            $table->integer('transfert_id')->nullable()->index('main_main');
            $table->integer('filiere_id')->index('file_trans');
            $table->integer('classroom_id')->nullable()->index('class_room');
            $table->integer('academie_id')->nullable()->index('acade_transf');
            $table->tinyInteger('pris_en_charge')->nullable();
            $table->tinyInteger('anciennete')->nullable();
            $table->integer('motif');
            $table->binary('description')->nullable();
            $table->string('piece_eleve', 20)->nullable();
            $table->string('piece_tuteur', 20)->nullable();
            $table->string('piece_motif', 20)->nullable();
            $table->tinyInteger('traitement_aca')->nullable();
            $table->tinyInteger('traitement_nat')->nullable();
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elevetransferes');
    }
};
