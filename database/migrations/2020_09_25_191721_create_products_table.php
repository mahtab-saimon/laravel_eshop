<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('product_name');
            $table->string('catId');
            $table->string('brandId');
            $table->string('productCode');
            $table->string('productPlce');
            $table->string('productRoute');
            $table->text('productDescription');
            $table->string('productImage');
            $table->string('buyingPrice');
            $table->string('sellingPrice');
            $table->string('size');
            $table->string('color');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
