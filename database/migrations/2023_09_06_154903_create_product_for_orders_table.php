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
        Schema::create('product_for_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->Integer('Quantity');
            $table->Integer('TotalPrice');
            $table->bigInteger('user_id');
            $table->bigInteger('Order_Info_Id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_for_orders');
    }
};
