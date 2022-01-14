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
        DB::statement('ALTER TABLE `prescriptions` CHANGE  `medicine_name` `medicine_name` VARCHAR(256)  NULL DEFAULT NULL');
        DB::statement('ALTER TABLE `prescriptions` CHANGE  `quantity` `quantity` VARCHAR(256)  NULL DEFAULT NULL');
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
