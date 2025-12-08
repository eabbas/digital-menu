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
        Schema::create('ecomm_products', function (Blueprint $table) {
            $table->id();
             $table->string('title');
            $table->string('description');
            $table->string('price');
            $table->string('discount');
            $table->tinyInteger('show_in_home')->nullable();
            $table->string('ecomm_id');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecomm_products');
    }
};
