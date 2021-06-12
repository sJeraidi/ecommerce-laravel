<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_categorys', function (Blueprint $table) {
           
            $table->bigIncrements('category_id');
            $table->string('category_name',255);
            $table->text('category_description');
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
        Schema::dropIfExists('_categorys');
    }
}
