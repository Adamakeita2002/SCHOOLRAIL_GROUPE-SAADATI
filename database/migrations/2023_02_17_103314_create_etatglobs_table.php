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
        Schema::create('etatglobs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('Region', 100);
            $table->string('Cercle', 100);
            $table->string('Ae', 100);
            $table->string('Type_ets', 500);
            $table->string('Stat', 100);
            $table->string('Sigle_ets', 100);
            $table->string('Nom_comp', 500);
            $table->string('Bt_ad', 100);
            $table->string('Bt_ap', 100);
            $table->string('Bt_ind', 100);
            $table->string('Cap_ad', 100);
            $table->string('Cap_ind', 100);
            $table->string('Lycee', 100);
            $table->string('Lycee_tec', 100);
            $table->string('Total_g', 100);
            $table->string('Frais', 100);
            $table->string('Demi', 100);
            $table->string('Pension', 100);
            $table->string('Montant_g', 100);
            $table->timestamp('Created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('Updated_at')->useCurrentOnUpdate()->useCurrent();
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
        Schema::dropIfExists('etatglobs');
    }
};
