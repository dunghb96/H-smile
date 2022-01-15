<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name',256);
            $table->integer('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('email',256)->nullable();
            $table->string('code_cookie',256)->nullable();
            $table->string('phone_number',256)->nullable();
            $table->string('address',256)->nullable();
            $table->integer('status')->nullable();
            $table->string('status_desc',256)->nullable();
            $table->string('disease_history',256)->nullable();
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
        Schema::dropIfExists('patients');
    }
}
