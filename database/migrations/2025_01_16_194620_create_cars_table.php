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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('miles');
            $table->string('fuel_type');
            $table->string('transmission');
            $table->integer('owners');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->string('condition');
            $table->integer('cylinders');
            $table->string('chassis_number')->nullable();
            $table->integer('doors');
            $table->integer('year');
            $table->string('color');
            $table->integer('seats');
            $table->integer('city_mpg')->nullable();
            $table->integer('highway_mpg')->nullable();
            $table->string('engine_size');
            $table->string('drive_type');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade'); // Foreign key to brands
            $table->foreignId('car_model_id')->constrained()->onDelete('cascade'); // Foreign key to car_models
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
