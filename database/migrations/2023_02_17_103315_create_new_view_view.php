<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `new_view` AS select `zonage_bd`.`users`.`id` AS `id`,`zonage_bd`.`users`.`sigle` AS `sigle`,`zonage_bd`.`users`.`nom` AS `nom`,`zonage_bd`.`users`.`ville` AS `ville`,`zonage_bd`.`users`.`commune` AS `commune`,`zonage_bd`.`users`.`cercle` AS `cercle`,`zonage_bd`.`users`.`academie` AS `academie`,`zonage_bd`.`users`.`region` AS `region`,`zonage_bd`.`users`.`statut` AS `statut`,`zonage_bd`.`users`.`type` AS `type`,`zonage_bd`.`users`.`filiere` AS `filiere`,`zonage_bd`.`users`.`zone1` AS `zone1`,`zonage_bd`.`users`.`zone2` AS `zone2`,`zonage_bd`.`users`.`latitude` AS `latitude`,`zonage_bd`.`users`.`longitude` AS `longitude`,`zonage_bd`.`users`.`emailEtb` AS `emailEtb`,`zonage_bd`.`users`.`telEtb` AS `telEtb`,`zonage_bd`.`users`.`creation` AS `creation`,`zonage_bd`.`users`.`creationDoc` AS `creationDoc`,`zonage_bd`.`users`.`ouverture` AS `ouverture`,`zonage_bd`.`users`.`ouvertureDoc` AS `ouvertureDoc`,`zonage_bd`.`users`.`nomProm` AS `nomProm`,`zonage_bd`.`users`.`prenomProm` AS `prenomProm`,`zonage_bd`.`users`.`emailProm` AS `emailProm`,`zonage_bd`.`users`.`telProm` AS `telProm`,`zonage_bd`.`users`.`academie_id` AS `academie_id`,`zonage_bd`.`users`.`code` AS `code`,`zonage_bd`.`users`.`password` AS `password`,`zonage_bd`.`users`.`created_at` AS `created_at`,`zonage_bd`.`users`.`updated_at` AS `updated_at` from `zonage_bd`.`users`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `new_view`");
    }
};
