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
        Schema::table('classroom_filiere', function (Blueprint $table) {
            $table->foreign(['filiere_id'], 'fil_filier')->references(['id'])->on('filieres')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['classroom_id'], 'clas_clsr')->references(['id'])->on('classrooms')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classroom_filiere', function (Blueprint $table) {
            $table->dropForeign('fil_filier');
            $table->dropForeign('clas_clsr');
        });
    }
};
