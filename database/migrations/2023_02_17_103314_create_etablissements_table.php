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
        Schema::create('etablissements', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('sigle', 50)->nullable();
            $table->string('nom', 300)->nullable();
            $table->string('statut', 100)->nullable();
            $table->string('email', 100)->nullable();
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
            $table->string('profProm', 100)->nullable();
            $table->string('emailProm', 100)->nullable();
            $table->string('telProm', 20)->nullable();
            $table->string('rue', 20)->nullable();
            $table->string('porte', 20)->nullable();
            $table->integer('academie_id')->nullable()->index('ae_etab');
            $table->integer('type_etab_id')->nullable()->index('type_etab');
            $table->integer('commune_id')->nullable()->index('com_etab');
            $table->string('code', 10)->nullable();
            $table->string('logo', 20)->nullable();
            $table->string('image', 20)->nullable();
            $table->text('observation')->nullable();
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
        Schema::dropIfExists('etablissements');
    }
};
