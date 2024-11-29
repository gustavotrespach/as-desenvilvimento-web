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
        Schema::create('dragons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->integer('age');
            $table->string('element', 100);
            $table->text('image')->nullable();
            $table->foreignId('trainer_id')->references('id')->on('trainers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dragons');
    }
};
