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
        Schema::create('check_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('programming_time')->default(0);
            $table->string('programming_description')->nullable();
            $table->integer('english_time')->default(0);
            $table->string('english_description')->nullable();
            $table->integer('reading_time')->default(0);
            $table->string('reading_description')->nullable();
            $table->integer('user_id');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_lists');
    }
};
