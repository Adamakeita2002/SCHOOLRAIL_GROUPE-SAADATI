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
        Schema::create('agents', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('fullname', 50);
            $table->string('matricule', 50);
            $table->string('email', 50);
            $table->date('birthdate')->nullable();
            $table->string('tel', 50);
            $table->string('gender', 50);
            $table->string('poste', 100);
            $table->string('corp', 100);
            $table->string('bank', 100)->nullable();
            $table->string('banknum', 100)->nullable();
            $table->integer('unity_id');
            $table->string('image', 50);
            $table->string('img', 50);
            $table->string('address', 50);
            $table->string('password', 100);
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('agents');
    }
};
