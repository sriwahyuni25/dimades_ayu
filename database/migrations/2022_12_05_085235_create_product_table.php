<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mitra_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->integer('price');
            $table->integer('stock');
            $table->char('type',1);
            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('mitra_id')->references('id')->on('mitras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
