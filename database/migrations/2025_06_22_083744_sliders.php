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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image_path'); // Path to the uploaded image
            $table->string('title')->nullable(); // Optional title for the slider
            $table->text('description')->nullable(); // Optional description
            $table->string('link_url')->nullable(); // Optional link when slider is clicked
            $table->integer('order')->default(0); // Order of slider display (1,2,3,4)
            $table->boolean('is_active')->default(true); // Enable/disable slider
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
