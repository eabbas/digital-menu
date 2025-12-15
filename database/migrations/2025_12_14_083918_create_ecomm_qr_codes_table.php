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
        Schema::create('ecomm_qr_codes', function (Blueprint $table) {
            $table->id();
           $table->string('qr_path');
           $table->string('user_id');
           $table->string('ecomm_id');
           $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecomm_qr_codes');
    }
};
