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
        Schema::create('customebarcods', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('unitSystem')->default('mm');
            $table->integer('width');
            $table->integer('length');
            $table->integer('quantity');
            $table->string('material')->nullable(); // e.g., paper, vinyl, etc.
            $table->string('adhesive')->nullable(); // e.g., permanent, removable
            $table->string('barcodeType')->nullable(); // e.g., CODE128, QR
            $table->json('options')->nullable(); // e.g., ["sequential"]
            $table->string('totalPrice')->nullable(); // e.g., ₹3,304
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('customebarcods');
    }
};
