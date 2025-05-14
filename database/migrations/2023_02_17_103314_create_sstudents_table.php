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
        Schema::create('sstudents', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nom', 50)->nullable();
            $table->string('prenom', 100)->nullable();
            $table->string('matricule', 50)->nullable();
            $table->string('sigle', 20)->nullable();
            $table->string('opt', 100)->nullable();
            $table->string('classe', 200)->nullable();
            $table->string('charge', 20)->nullable();
            $table->string('etat', 20)->nullable();
            $table->string('observation', 100)->nullable();
            $table->string('codePlace', 10)->nullable();
            $table->string('codeSerie', 10)->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->integer('annee_def')->nullable();
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
        Schema::dropIfExists('sstudents');
    }
};
