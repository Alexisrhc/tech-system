<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_services', function (Blueprint $table) {
            $table->bigIncrements('id_bill_services');
            $table->unsignedBigInteger('id_bill');
            $table->foreign('id_bill')->references('id_bill')->on('bills');
            $table->string('type_service');
            $table->string('price');
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
        Schema::dropIfExists('bill_services');
    }
}
