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
            $table->bigIncrements('product_id');
            $table->string('product_name',255);
            $table->string('image',255);

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('_categorys');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('brand_id')->on('_brands');

            $table->string('width',255);
            $table->string('height',255);
            $table->text('description');
            $table->string('product_price',255);
            $table->integer('quantity');
            $table->string('url',255);
            $table->enum('status',[1,0]);
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
