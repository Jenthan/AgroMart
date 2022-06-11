<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliver_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deliver_id');					
            $table->foreign('deliver_id')->references('id')->on('deliver_products')->onDelete('cascade');    
            $table->string('orderAddressNo');
			$table->string('orderAddressStreet');
			$table->string('orderAddressCity');
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
        Schema::dropIfExists('deliver_details');
    }
}
