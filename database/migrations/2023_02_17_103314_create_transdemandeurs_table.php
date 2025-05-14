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
        Schema::create('transdemandeurs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nom', 100);
            $table->string('tel', 11);
            $table->string('email', 50);
            $table->string('piece_1', 50)->nullable();
            $table->string('piece_2', 50)->nullable();
            $table->integer('traitement_code')->nullable();
            $table->integer('eleve_id')->index('trans_dem');
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
        Schema::dropIfExists('transdemandeurs');
    }
};
