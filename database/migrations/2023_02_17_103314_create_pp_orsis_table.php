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
        Schema::create('pp_orsis', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('objspecifique_id')->nullable()->index('obj_ors');
            $table->integer('resultat_id')->nullable()->index('res_ors');
            $table->integer('indicateur_id')->nullable()->index('ind_ors');
            $table->integer('sourcevef_id')->nullable()->index('sour_ors');
            $table->integer('sousprogramme_id')->nullable()->index('sousp_ors');
            $table->integer('strategie_id')->nullable()->index('str_ors');
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
        Schema::dropIfExists('pp_orsis');
    }
};
