<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addproducts', function (Blueprint $table) {
            $table->id();
            $table->integer('product_seriesnumber');
            $table->string('product_name');
            $table->unsignedBigInteger('id_categories');
            $table->foreign('id_categories')->references('id')->on('productcategories')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('stock');
            $table->string('product_image');
            $table->integer('product_price');
            $table->integer('tube_price');
            $table->integer('trigger');
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
        Schema::dropIfExists('addproducts');
    }
}
