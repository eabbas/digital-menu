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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('cartNumber')->nullable();
            $table->integer('career_id');
            $table->integer('qr_code_id')->nullable();
            $table->integer('menu_item_id')->unique();
            $table->integer('user_id')->unique();
            $table->tinyInteger('quantity')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('show_for_customer')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
