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
        Schema::create('activities', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('label');
            $table->string('code', 200);
            $table->string('respmeo', 200);
            $table->string('periodmeo', 100);
            $table->string('tdr', 100);
            $table->string('decision', 100);
            $table->string('budget', 100);
            $table->string('extdr', 10);
            $table->string('extdecision', 10);
            $table->string('extbudget', 10);
            $table->string('chapitre', 100);
            $table->string('source', 50);
            $table->integer('qteprev');
            $table->integer('coutprev');
            $table->integer('montantprev');
            $table->string('state', 20);
            $table->integer('qtereal');
            $table->integer('coutreal');
            $table->integer('montantreal');
            $table->integer('structure_id');
            $table->integer('activityop_id');
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
        Schema::dropIfExists('activities');
    }
};
