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
        Schema::create('courriers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('title');
            $table->binary('description')->nullable();
            $table->string('doc', 20)->nullable();
            $table->string('expediteur', 100);
            $table->timestamp('wdate')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('adate')->default('0000-00-00 00:00:00');
            $table->integer('state')->nullable();
            $table->integer('structure_id')->index('cou_str');
            $table->integer('dispcour_id')->nullable();
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
        Schema::dropIfExists('courriers');
    }
};
