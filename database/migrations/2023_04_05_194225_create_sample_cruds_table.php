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
        Schema::create('sample_cruds', function (Blueprint $table) {
            $table->id();
            $table->string('n_of_mouse');
            $table->string('n_0f_keyboard');
            $table->string('n_of_functioning');
            $table->string('n_of_not_connected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample_cruds');
    }
};
