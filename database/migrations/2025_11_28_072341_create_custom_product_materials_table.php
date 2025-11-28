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
        Schema::create('custom_product_materials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('price_per_unit');
            $table->string('category_name');
            $table->string('image')->nullable();
            $table->tinyInteger('required');
            $table->integer('order');
            $table->integer('category_limit');
            $table->integer('unit_limit');
            $table->integer('custom_product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_product_materials');
    }
};
