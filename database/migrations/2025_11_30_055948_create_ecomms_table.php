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
        Schema::create('ecomms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
             $table->string('logo')->nullable();
             $table->string('banner')->nullable();
            $table->string('description');
            $table->string('title');
            $table->string('address');
            $table->string('user_id');
            $table->string('email')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecomms');
    }
};
