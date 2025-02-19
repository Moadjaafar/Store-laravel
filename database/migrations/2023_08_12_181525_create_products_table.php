<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Product_name');
            $table->text('Product_short_description');
            $table->text('Product_long_description');
            $table->bigInteger('category_id');
            $table->string('category_name');
            $table->integer('Price');
            $table->integer('Quantity');
            $table->string('Product_Image');
            $table->integer('Discount');
            $table->integer('Price_befor_Discount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
