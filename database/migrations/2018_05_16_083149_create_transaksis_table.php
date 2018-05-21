<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->char('invoice_no', 8)->unique();
            $table->text('items');
            $table->string('customer');
            $table->string('tlpn_cust', 20);
            $table->unsignedInteger('payment');
            $table->unsignedInteger('total');
            $table->integer('user_id')->unsigned();
            $table->integer('products_unit_id')->unsigned();
            $table->integer('stok_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('products_unit_id')->references('id')->on('products_units');
            $table->foreign('stok_id')->references('id')->on('stoks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
