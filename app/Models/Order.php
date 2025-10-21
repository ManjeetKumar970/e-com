<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number',
        'user_id',
        'first_name',
        'last_name',
        'company_name',
        'gst_number',
        'email',
        'phone',
        'street_address',
        'address_line_2',
        'city',
        'state',
        'pin_code',
        'country',
        'same_as_billing',
        'payment_method',
        'payment_status',
        'subtotal',
        'discount',
        'delivery_charges',
        'gst_amount',
        'gst_rate',
        'grand_total',
        'promo_code',
        'order_status',
        'notes',
        'order_date',
    ];

    protected $casts = [
        'same_as_billing' => 'boolean',
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'delivery_charges' => 'decimal:2',
        'gst_amount' => 'decimal:2',
        'gst_rate' => 'decimal:2',
        'grand_total' => 'decimal:2',
        'order_date' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = 'ORD-' . strtoupper(uniqid());
            }
            if (empty($order->order_date)) {
                $order->order_date = now();
            }
        });
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Accessors
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFullAddressAttribute()
    {
        $address = $this->street_address;
        if ($this->address_line_2) {
            $address .= ', ' . $this->address_line_2;
        }
        $address .= ', ' . $this->city . ', ' . $this->state . ' - ' . $this->pin_code;
        return $address;
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('order_status', 'pending');
    }

    public function scopeCompleted($query)
    {
        return $query->where('order_status', 'delivered');
    }

    public function scopeByPaymentStatus($query, $status)
    {
        return $query->where('payment_status', $status);
    }
}
