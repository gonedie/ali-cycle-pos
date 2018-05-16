<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stoks', function (Blueprint $table) {
            $table->increments('id');
            $table->char('sm_no', 8)->unique();
            $table->integer('stok_masuk');
            $table->integer('stok_awal');
            $table->integer('stok_akhir');
            $table->integer('penjualan_stok');
            $table->unsignedInteger('harga_beli');
            $table->unsignedInteger('total');
            $table->timestamp('tgl_masuk');
            $table->integer('unit_id')->unsigned();
            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('products_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stoks');
    }
}
