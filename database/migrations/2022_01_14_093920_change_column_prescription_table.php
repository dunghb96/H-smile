<?php

use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Schema;

class ChangeColumnPrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        DB::statement('ALTER TABLE `prescriptions` CHANGE  `medicine_name` `medicine_id` VARCHAR(256)  NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `prescriptions` CHANGE  `quantity` `total_quantity` VARCHAR(1024)  NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `prescriptions` ADD  `detail`  VARCHAR(256)  NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `prescriptions` ADD  `note`  TEXT  NULL DEFAULT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
