<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {

            $table->id();	
            $table->unsignedBigInteger('user_id');					
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  				

            $table->string('vehicleNo');
			$table->string('vehiclePhoto')->nullable();
			$table->string('vehicleType');
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
        Schema::dropIfExists('vehicles');
    }
}
