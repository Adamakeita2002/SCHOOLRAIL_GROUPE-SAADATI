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
        Schema::create('newsactus', function (Blueprint $table) {
            $table->integer('id', true);
            $table->binary('title');
            $table->binary('description');
            $table->string('upload', 50)->nullable();
            $table->tinyInteger('status');
            $table->integer('personel_id')->nullable()->index('news_pers');
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
        Schema::dropIfExists('newsactus');
    }
};
