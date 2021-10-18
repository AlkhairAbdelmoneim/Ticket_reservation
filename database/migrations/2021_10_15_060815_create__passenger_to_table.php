<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone' ,20);
            $table->bigInteger('model_bus');
            $table->string('chair_count');
            $table->string('price' ,255);
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
        Schema::dropIfExists('_passenger_to');
    }
}
