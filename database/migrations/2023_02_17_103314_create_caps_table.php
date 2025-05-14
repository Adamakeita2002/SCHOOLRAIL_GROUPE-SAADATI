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
        Schema::create('caps', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nom', 50);
            $table->string('email', 50)->nullable();
            $table->string('tel', 20)->nullable();
            $table->string('password', 100)->nullable();
            $table->integer('commune_id')->nullable();
            $table->integer('academie_id')->nullable()->index('aca_cap');
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
        Schema::dropIfExists('caps');
    }
};
