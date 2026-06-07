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
        Schema::create('mahdi_question_options', function (Blueprint $table) {
            $table->id();
            $table->integer('mahdiQuestion_id')->default(0);
            $table->string('option')->nullable();
            $table->tinyInteger('right_answer')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahdi_question_options');
    }
};
