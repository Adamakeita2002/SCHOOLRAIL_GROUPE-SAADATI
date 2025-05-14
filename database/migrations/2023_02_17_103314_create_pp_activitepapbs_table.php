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
        Schema::create('pp_activitepapbs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('titre')->nullable();
            $table->integer('code')->nullable();
            $table->string('nature', 500)->nullable();
            $table->text('unite_compte')->nullable();
            $table->integer('strategie_id')->nullable()->index('act_stra');
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
        Schema::dropIfExists('pp_activitepapbs');
    }
};
