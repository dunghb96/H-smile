<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name', 256)->nullable();
            $table->integer('age')->nullable();
            $table->string('address', 256)->nullable();
            $table->integer('gender')->nullable();
            $table->string('email', 256)->nullable();
            $table->string('phone_number', 256)->nullable();
            $table->integer('shift')->nullable();
            $table->date('date_at')->nullable();
            $table->integer('status');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
