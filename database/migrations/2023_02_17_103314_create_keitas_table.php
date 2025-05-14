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
        Schema::create('keitas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('matricule', 100);
            $table->string('prenoms', 100);
            $table->string('nom', 100);
            $table->string('sigle', 500);
            $table->string('cycle', 100);
            $table->string('charge', 100);
            $table->timestamp('Created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('Updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keitas');
    }
};
