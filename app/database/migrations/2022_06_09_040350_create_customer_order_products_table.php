<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');					
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');					
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade'); 
            $table->unsignedBigInteger('farmer_id');					
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');   
			$table->string('qty');
            $table->enum('orderstatus',['confirmed','notconfirmed']); 
            $table->time('ordertime')->nullable();
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
        Schema::dropIfExists('customer_order_products');
    }
}
