<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('type', ['tablet', 'kapsul', 'sirup', 'serbuk', 'gel']);
            $table->longText('description')->nullable();
            $table->integer('price');
            $table->integer('stock');
            $table->string('image')->nullable();
            $table->string('slug');
            $table->integer('sold')->nullable()->default(0);
            $table->integer('rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
}
