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
        Schema::create('personels', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('fullname', 50);
            $table->string('matricule', 50);
            $table->string('email', 50);
            $table->date('birthdate')->nullable();
            $table->string('tel', 50);
            $table->string('gender', 50);
            $table->integer('poste_id')->index('per_post');
            $table->integer('bank_id')->nullable()->index('per_bank');
            $table->string('banknum', 100)->nullable();
            $table->integer('statut_id')->nullable();
            $table->integer('corp_id')->nullable()->index('per_corp');
            $table->integer('section_id')->nullable()->index('per_sec');
            $table->integer('division_id')->nullable()->index('per_div');
            $table->integer('structure_id')->nullable()->index('per_str');
            $table->integer('ministre_id')->nullable()->index('per_min');
            $table->integer('segal_id')->nullable()->index('per_seg');
            $table->integer('chefcab_id')->nullable()->index('per_chefcab');
            $table->integer('constech_id')->nullable()->index('per_ct');
            $table->integer('chargmi_id')->nullable()->index('per_cm');
            $table->string('image', 50)->nullable();
            $table->string('img', 50)->nullable();
            $table->string('address', 50)->nullable();
            $table->string('password', 100)->nullable();
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
        Schema::dropIfExists('personels');
    }
};
