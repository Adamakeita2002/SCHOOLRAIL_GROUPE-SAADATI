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
        Schema::create('academies', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nom', 100);
            $table->string('code', 20);
            $table->string('email', 50);
            $table->string('tel', 20);
            $table->string('image', 20)->nullable();
            $table->string('password', 100);
            $table->integer('region_id')->index('aca_reg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academies');
    }
};
