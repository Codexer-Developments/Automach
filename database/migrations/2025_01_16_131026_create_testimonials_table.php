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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the person giving the testimonial
            $table->string('position')->nullable(); // Position/role of the person
            $table->text('message'); // Testimonial message
            $table->string('image')->nullable(); // Optional image of the person
            $table->boolean('is_visible')->default(true); // Visibility status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
