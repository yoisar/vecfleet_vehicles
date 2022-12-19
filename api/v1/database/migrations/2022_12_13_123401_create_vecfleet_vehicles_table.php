<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vecfleet_vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('id_type');
            $table->integer('id_brand');
            $table->smallInteger('wheels');            
            $table->string('model');
            $table->string('patent');
            $table->string('chassis');
            $table->string('km_traveled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vecfleet_vehicles');
    }
};
