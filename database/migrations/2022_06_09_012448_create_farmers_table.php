<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');					
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('firstName');
            $table->string('lastName');
			$table->string('gsCertificate')->nullable();
			$table->string('farmName');
			$table->string('farmAddressNo');
			$table->string('farmAddressStreet');
			$table->string('farmAddressCity');
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
        Schema::dropIfExists('farmers');
    }
}
