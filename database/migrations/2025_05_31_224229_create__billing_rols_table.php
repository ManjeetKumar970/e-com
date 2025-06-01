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
        Schema::create('billing_rols', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('size');
            $table->string('page_thickness'); // remove space from column name
            $table->string('color')->nullable();
            $table->string('paper_type')->nullable();
            $table->string('length')->nullable();
            $table->string('core')->nullable();
            $table->text('description')->nullable();
             $table->text('images')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_rols');
    }
};
