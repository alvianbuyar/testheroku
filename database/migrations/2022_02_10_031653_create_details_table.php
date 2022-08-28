<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_purchaselogs');
            $table->unsignedBigInteger('id_addproducts');
            $table->foreign('id_purchaselogs')->references('id')->on('purchaselogs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_addproducts')->references('id')->on('addproducts')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('tube_status');
            $table->integer('total_product');
            $table->integer('loan_status');
            $table->integer('total_detail');
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
        Schema::dropIfExists('details');
    }
}
