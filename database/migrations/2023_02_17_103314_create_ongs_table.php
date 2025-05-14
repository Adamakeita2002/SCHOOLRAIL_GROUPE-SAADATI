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
        Schema::create('ongs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('nom')->nullable();
            $table->string('code', 50)->nullable();
            $table->string('type', 100)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('tel', 50)->nullable();
            $table->string('address', 50)->nullable();
            $table->string('rnom', 100)->nullable();
            $table->string('remail', 50)->nullable();
            $table->string('rtel', 50)->nullable();
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
        Schema::dropIfExists('ongs');
    }
};
