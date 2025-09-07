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
            Schema::create('menu_location_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_location_id');
            $table->unsignedBigInteger('navbar_item_id');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('menu_location_id')
                ->references('id')
                ->on('menu_locations')
                ->onDelete('cascade');

            $table->foreign('navbar_item_id')
                ->references('id')
                ->on('navbar_items')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_location_items');
    }
};
