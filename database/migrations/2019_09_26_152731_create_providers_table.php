<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id_provider');
            $table->string('rif')->unique();
            $table->string('business_name');
            $table->string('contact');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');

            $table->string('bank');
            $table->string('bank_account');
            $table->string('name_bank_account');
            $table->string('id_bank_account');

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
        Schema::dropIfExists('providers');
    }
}
