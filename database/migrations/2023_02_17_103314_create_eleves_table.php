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
        Schema::create('eleves', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('matricule', 30)->nullable();
            $table->string('prenom', 100)->nullable();
            $table->string('nom', 50)->nullable();
            $table->string('sexe', 1)->nullable();
            $table->string('date_naissance', 50)->nullable();
            $table->string('nationalite', 100)->nullable();
            $table->string('image', 10)->nullable();
            $table->string('photo', 50)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('prenom_pere', 100)->nullable();
            $table->string('nom_pere', 50)->nullable();
            $table->string('prenom_mere', 100)->nullable();
            $table->string('nom_mere', 50)->nullable();
            $table->string('option_def', 10)->nullable();
            $table->string('code_acp', 50)->nullable();
            $table->string('annee_def', 10)->nullable();
            $table->string('code_ae_def', 2)->nullable();
            $table->string('num_place_def', 100)->nullable();
            $table->string('prof_pere', 50)->nullable();
            $table->string('prof_mere', 50)->nullable();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
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
        Schema::dropIfExists('eleves');
    }
};
