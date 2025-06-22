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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('usertype')->default('user')->change();
            $table->string('profile_img')->nullable();
            $table->string('mobile_number')->nullable();
            $table->boolean('if_user_is_prime')->default(false);
            $table->string('pancard')->nullable(); // Optional: can add condition in model/form
            $table->json('stats')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
