<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_img',
        'mobile_number', 'if_user_is_prime', 'pancard', 'stats','usertype'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
 * Get the cart items for the user
 */
public function cartItems()
{
    return $this->hasMany(CartItem::class);
}

/**
 * Get the wishlist items for the user
 */
public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}

/**
 * Check if a product is in user's wishlist
 */
public function hasInWishlist($productId)
{
    return $this->wishlists()->where('product_id', $productId)->exists();
}
}
