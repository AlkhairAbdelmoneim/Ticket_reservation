<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionTable extends Migration
{

    public function up()
    {
        Schema::create('petition', function (Blueprint $table) {
            $table->id();
            $table->string('name' ,35);
            $table->string('lawyer_name');
            $table->string('lawyer_phone');
            $table->string('petition_name');
            $table->text('subject_appeal');
            $table->text('type_petition');
            $table->text('type_judgment');
            $table->bigInteger('em_research')->default(null);
            $table->string('payment');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('petition');
    }
}
