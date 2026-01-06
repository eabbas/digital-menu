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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('logo')->nullable();
            $table->string('city_id');
            $table->string('address');
            $table->string('social_media')->nullable();
            $table->string('user_id');
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->integer('career_category_id')->default(0);
            $table->string('banner')->nullable();
            $table->integer('qr_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
