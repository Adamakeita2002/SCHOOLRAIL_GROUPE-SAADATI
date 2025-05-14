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
        Schema::create('structures', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 100);
            $table->string('code', 20);
            $table->string('email', 50);
            $table->string('tel', 50);
            $table->string('address', 50);
            $table->string('type', 50);
            $table->string('rname', 100);
            $table->string('rtel', 50);
            $table->string('website', 100)->nullable();
            $table->string('image', 50);
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
            $table->string('password', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('structures');
    }
};
