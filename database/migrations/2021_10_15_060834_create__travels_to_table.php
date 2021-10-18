<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelsToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->string('travel_name');
            $table->integer('travel_no');
            $table->string('travel_from');
            $table->string('travel_to');
            $table->string('travel_date');
            $table->time('travel_go');
            $table->time('travel_arive');
            $table->time('travel_arive');
            $table->bigInteger('model_bus');
            $table->string('tickets_no');
            $table->integer('price');
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
        Schema::dropIfExists('_travels_to');
    }
}
