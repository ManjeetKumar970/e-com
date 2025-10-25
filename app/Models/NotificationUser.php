<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationUser extends Model
{
   use HasFactory;

    protected $table = 'notification_user'; // explicit table name

    protected $fillable = [
        'notification_id',
        'user_id',
        'is_read',
    ];

    // Relationships

    // Belongs to a notification
    public function notification()
    {
        return $this->belongsTo(Notification::class, 'notification_id');
    }

    // Belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
