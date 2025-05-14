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
        Schema::table('personels', function (Blueprint $table) {
            $table->foreign(['chefcab_id'], 'per_chefcab')->references(['id'])->on('chefcabs')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['structure_id'], 'per_str')->references(['id'])->on('structures')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['corp_id'], 'per_corp')->references(['id'])->on('corps')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['division_id'], 'per_div')->references(['id'])->on('divisions')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['poste_id'], 'per_post')->references(['id'])->on('postes')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['bank_id'], 'per_bank')->references(['id'])->on('banks')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['segal_id'], 'per_seg')->references(['id'])->on('segals')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['chargmi_id'], 'per_cm')->references(['id'])->on('chargmis')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['constech_id'], 'per_ct')->references(['id'])->on('consteches')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['ministre_id'], 'per_min')->references(['id'])->on('ministres')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['section_id'], 'per_sec')->references(['id'])->on('sections')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personels', function (Blueprint $table) {
            $table->dropForeign('per_chefcab');
            $table->dropForeign('per_str');
            $table->dropForeign('per_corp');
            $table->dropForeign('per_div');
            $table->dropForeign('per_post');
            $table->dropForeign('per_bank');
            $table->dropForeign('per_seg');
            $table->dropForeign('per_cm');
            $table->dropForeign('per_ct');
            $table->dropForeign('per_min');
            $table->dropForeign('per_sec');
        });
    }
};
