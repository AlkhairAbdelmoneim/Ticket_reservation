<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelsHagzToTable extends Migration
{

    public function up()
    {
        Schema::create('travels_hagz_to', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('travels_hagz_to');
    }
}
