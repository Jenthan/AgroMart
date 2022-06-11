<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerRequestVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_request_vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmer_id');					
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');
            $table->unsignedBigInteger('vendor_id');					
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');    
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
        Schema::dropIfExists('farmer_request_vendors');
    }
}
