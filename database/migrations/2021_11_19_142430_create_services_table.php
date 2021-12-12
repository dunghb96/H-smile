<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ini_set('memory_limit', -1);

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->string('name', 256);
            $table->string('slug', 256);
            $table->integer('price')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->string('content')->nullable();
            $table->string('short_description')->nullable();
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
        Schema::dropIfExists('services');
    }
}
