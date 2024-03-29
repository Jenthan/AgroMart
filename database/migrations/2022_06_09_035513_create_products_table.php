<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('farmer_id');					
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');
			$table->string('productName');
            $table->string('productImg')->nullable();
			$table->integer('qty');
            $table->enum('productType',['fruit','vegetable','milk']); 
			$table->integer('unitPrice');
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
        Schema::dropIfExists('products');
    }
}
