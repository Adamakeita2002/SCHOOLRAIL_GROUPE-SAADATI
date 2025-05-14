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
        Schema::create('uusers', function (Blueprint $table) {
            $table->integer('id')->default(0)->primary();
            $table->string('sigle', 50)->nullable();
            $table->string('nom', 300)->nullable();
            $table->string('ville', 100)->nullable();
            $table->string('commune', 100)->nullable();
            $table->string('cercle', 100)->nullable();
            $table->string('academie', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('statut', 100)->nullable();
            $table->string('type', 100)->nullable();
            $table->string('filiere', 100)->nullable();
            $table->string('zone1', 300)->nullable();
            $table->string('zone2', 300)->nullable();
            $table->string('latitude', 50)->nullable();
            $table->string('longitude', 50)->nullable();
            $table->string('emailEtb', 100)->nullable();
            $table->string('telEtb', 20)->nullable();
            $table->string('creation', 500)->nullable();
            $table->string('creationDoc', 50)->nullable();
            $table->string('ouverture', 500)->nullable();
            $table->string('ouvertureDoc', 50)->nullable();
            $table->string('nomProm', 100)->nullable();
            $table->string('prenomProm', 100)->nullable();
            $table->string('emailProm', 100)->nullable();
            $table->string('telProm', 20)->nullable();
            $table->integer('academie_id')->nullable();
            $table->string('code', 10)->nullable();
            $table->string('password', 100)->nullable();
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('uusers');
    }
};
