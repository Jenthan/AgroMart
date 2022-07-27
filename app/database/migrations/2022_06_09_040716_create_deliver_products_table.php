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
            $table->unsignedBigInteger('customer_id');					
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
			$table->unsignedBigInteger('product_id');					
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			$table->unsignedBigInteger('vendor_id');					
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');  
            $table->integer('orderQuantity');
            $table->enum('deliverstatus',['delivered','processing','pending','cancelled'])->nullable();  
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
