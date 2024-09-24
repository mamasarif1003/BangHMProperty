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
            $table->string('name',100)->index();
            $table->unsignedInteger('l_bangunan')->nullable();
            $table->unsignedInteger('l_tanah');
            $table->unsignedInteger('k_tidur')->nullable();
            $table->unsignedInteger('k_mandi')->nullable();
            $table->unsignedInteger('j_lantai')->nullable();
            $table->string('slug',100);
            $table->string('pict',100)->index();
            $table->string('category',100)->index();
            $table->string('price',20)->index();
            $table->string('place')->index();
            $table->string('writer')->index();
            $table->string('keywords')->nullable();
            $table->string('description',10000);
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
