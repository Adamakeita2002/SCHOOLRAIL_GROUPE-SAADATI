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
        Schema::create('attributions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('Matricule', 100);
            $table->string('Prenoms', 100);
            $table->string('Sigle', 100);
            $table->string('Nom_comp', 500);
            $table->string('Cycle', 100);
            $table->string('Classe', 100);
            $table->string('Statut', 100);
            $table->string('Type_etab', 100);
            $table->string('Ae', 100);
            $table->string('Commune', 100);
            $table->string('Cercle', 100);
            $table->string('Region', 100);
            $table->timestamp('Created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('Updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->string('Nom', 100)->nullable();
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributions');
    }
};
