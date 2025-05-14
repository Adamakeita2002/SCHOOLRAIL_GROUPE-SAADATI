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
        Schema::create('maintiens', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('libelle', 100);
            $table->integer('anneesco_id')->index('ann_main');
            $table->tinyInteger('start')->nullable();
            $table->tinyInteger('previous')->nullable();
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
        Schema::dropIfExists('maintiens');
    }
};
