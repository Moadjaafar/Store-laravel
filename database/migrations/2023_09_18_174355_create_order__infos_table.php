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
        Schema::create('order__infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('Fist_Name');
            $table->string('Last_Name');
            $table->string('Phone_number');
            $table->string('Email');
            $table->string('Address');
            $table->string('City');
            $table->string('Order_Notes');
            $table->string('Status')->default('En Attente');
            $table->string('Status_Livraison')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order__infos');
    }
};
