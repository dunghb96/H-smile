<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examination_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('appointment');
            $table->string('note')->nullable();
            $table->date('date_at');
            $table->integer('doctor');
            $table->integer('patient_id');
            $table->time('time_at');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examination_schedules');
    }
}
