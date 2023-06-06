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
        Schema::create('combinations', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('first_draw', false, true);
            $table->tinyInteger('second_draw', false, true);
            $table->tinyInteger('third_draw', false, true);
            $table->tinyInteger('fourth_draw', false, true);
            $table->tinyInteger('fifth_draw', false, true);
            $table->tinyInteger('sixth_draw', false, true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotteries');
    }
};
