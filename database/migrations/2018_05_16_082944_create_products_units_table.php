<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_unit', 100);
            $table->unsignedInteger('harga_jual');
            $table->string('kondisi', 10);
            $table->integer('type_id')->unsigned();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('type_merks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_units');
    }
}
