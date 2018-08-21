<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentConfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_confirms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->integer('status')->default(0);
            $table->string('payment_amount');
            $table->string('bank_receiver');
            $table->string('bank_form');
            $table->string('account_name');
            $table->string('account_nohp');
            $table->string('message');
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
        Schema::dropIfExists('payment_confirms');
    }
}
