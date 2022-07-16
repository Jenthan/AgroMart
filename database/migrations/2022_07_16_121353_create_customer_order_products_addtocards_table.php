<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrderProductsAddtocardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_order_products_addtocards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');					
            $table->unsignedBigInteger('customer_id');					    
			$table->string('qty');
            $table->time('ordertime');
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
        Schema::dropIfExists('customer_order_products_addtocards');
    }
}
