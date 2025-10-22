<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class OrderHistory extends Model
{
    protected $fillable = [
        'order_id',
        'status',
        'notes',
        'updated_by'
    ];

    /**
     * Get the order that owns the history
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the admin user who made the update
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get formatted status name
     */
    public function getStatusNameAttribute()
    {
        $statuses = [
            'pending' => 'Order Placed',
            'confirmed' => 'Order Confirmed',
            'processing' => 'Processing',
            'shipped' => 'Shipped',
            'delivered' => 'Delivered',
            'cancelled' => 'Cancelled'
        ];

        return $statuses[$this->status] ?? ucfirst($this->status);
    }
}
