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
        Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('category_id');
        $table->string('name', 255);
        $table->string('slug', 255)->unique();
        $table->text('description')->nullable();
        $table->string('short_description', 500)->nullable();
        $table->decimal('price', 10, 2);
        $table->decimal('sale_price', 10, 2)->nullable();
        $table->string('sku', 100)->unique()->nullable();
        $table->integer('stock_quantity')->default(0);
        $table->string('image_url', 255)->nullable();
        $table->boolean('is_featured')->default(0);
        $table->boolean('is_active')->default(1);
        $table->timestamps();

        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
