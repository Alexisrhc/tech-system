<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->bigIncrements('id_bill_detail');
            $table->unsignedBigInteger('id_bill_temporal');
            $table->foreign('id_bill_temporal')->references('id_bill_temporal')->on('bill_temporals');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id_product')->on('products');
            $table->string('quantity');
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
        Schema::dropIfExists('bill_details');
    }
}
