<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliver_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmer_request_vendors_id');					
            $table->foreign('farmer_request_vendors_id')->references('id')->on('farmer_request_vendors')->onDelete('cascade');
            $table->enum('deliverstatus',['delivered','processing','pending'])->nullable();  
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
        Schema::dropIfExists('deliver_products');
    }
}
