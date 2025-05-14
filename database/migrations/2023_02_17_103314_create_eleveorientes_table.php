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
        Schema::create('eleveorientes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('eleve_id')->nullable()->index('ele_ve');
            $table->integer('etablissement_id')->nullable()->index('etab_etab');
            $table->integer('cycle_id')->nullable()->index('cyccc_cycle');
            $table->integer('serie_id')->nullable()->index('serr_serie');
            $table->integer('orientation_id')->nullable()->index('main_main');
            $table->integer('filiere_id')->nullable()->index('fil_ori');
            $table->integer('classroom_id')->nullable()->index('class_room');
            $table->integer('academie_id')->nullable()->index('acade_orie');
            $table->tinyInteger('pris_en_charge')->nullable();
            $table->tinyInteger('anciennete')->nullable();
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
        Schema::dropIfExists('eleveorientes');
    }
};
