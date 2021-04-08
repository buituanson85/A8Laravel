<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSliderBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('name');
            $table->decimal('regular_price');
            $table->decimal('sale_price')->nullable();
            $table->string('title_one');
            $table->string('title_two');
            $table->string('title_three');
            $table->enum('status', ['instock', 'outofstock']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_banners');
    }
}
