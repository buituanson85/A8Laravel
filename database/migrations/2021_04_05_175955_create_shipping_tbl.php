<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('note');
            $table->unsignedInteger('customer_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippings');
    }
}
