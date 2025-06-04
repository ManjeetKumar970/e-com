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
        Schema::create('printers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('model_number')->nullable();
            $table->integer('dpi')->nullable();
            $table->string('connectivity')->nullable();
            $table->string('printer_type')->nullable();
            $table->integer('print_speed')->nullable();
            $table->string('warranty')->nullable();
            $table->text('description')->nullable();
            $table->json('images')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printers');
    }
};
