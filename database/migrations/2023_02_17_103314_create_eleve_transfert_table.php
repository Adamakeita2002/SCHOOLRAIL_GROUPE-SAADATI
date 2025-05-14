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
        Schema::create('eleve_transfert', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('eleve_id')->index('stu_main');
            $table->integer('etablissement_id')->index('user_main');
            $table->integer('transfert_id')->index('year_main');
            $table->integer('classe_id');
            $table->tinyInteger('charge');
            $table->tinyInteger('etat');
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
        Schema::dropIfExists('eleve_transfert');
    }
};
