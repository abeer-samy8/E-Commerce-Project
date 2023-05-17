<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('details')->nullable();
            $table->string('main_image');
            $table->string('images');
            $table->integer('category_id');
            $table->integer('store_id');
            $table->integer('currency_id');
            $table->integer('regular_price');
            $table->integer('sale_price')->nullable();
            $table->string('status', 50);
            $table->unsignedInteger('quantity')->default(10);
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
};
