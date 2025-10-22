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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            
            // Billing Information
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('gst_number', 15)->nullable();
            $table->string('email');
            $table->string('phone', 15);
            
            // Shipping Address
            $table->string('street_address', 500);
            $table->string('address_line_2', 500)->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('pin_code', 6);
            $table->string('country')->default('India');
            $table->boolean('same_as_billing')->default(false);
            
            // Payment Information
            $table->enum('payment_method', ['card', 'netbanking', 'upi', 'cod'])->default('card');
            $table->enum('payment_status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->string('transaction_id')->nullable(); // For payment gateway reference
            
            // Order Totals
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('delivery_charges', 10, 2)->default(0);
            $table->decimal('gst_amount', 10, 2);
            $table->decimal('gst_rate', 5, 2);
            $table->decimal('grand_total', 10, 2);
            
            // Promo Code
            $table->string('promo_code', 50)->nullable();
            $table->decimal('promo_discount', 10, 2)->default(0);
            
            // Order Status
            $table->enum('order_status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled', 'refunded'])->default('pending');
            
            // Additional Fields
            $table->text('notes')->nullable(); // Customer notes or admin notes
            $table->text('cancellation_reason')->nullable();
            $table->timestamp('order_date');
            $table->timestamp('shipped_date')->nullable();
            $table->timestamp('delivered_date')->nullable();
            
            // Tracking information
            $table->string('tracking_number')->nullable();
            $table->string('courier_name')->nullable();
            $table->string('bill_document')->nullable();
            $table->date('estimated_delivery')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes for better query performance
            $table->index('order_number');
            $table->index('user_id');
            $table->index('email');
            $table->index('phone');
            $table->index('order_status');
            $table->index('payment_status');
            $table->index('order_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
