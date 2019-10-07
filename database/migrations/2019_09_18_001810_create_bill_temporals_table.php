<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTemporalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_temporals', function (Blueprint $table) {
            $table->bigIncrements('id_bill_temporal');
            $table->enum('status', ['pendind','paid','cancelled']);
            $table->timestamps();
            // debe estar antes de crearse la relacion
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_temporals');
    }
}
