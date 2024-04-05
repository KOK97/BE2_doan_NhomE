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
        Schema::table('wishlist', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            
            // Kết nối foreign key với bảng products
            $table->foreign('product_id')->references('id')->on('product');
            
            // Kết nối foreign key với bảng users
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist');
    }
};
