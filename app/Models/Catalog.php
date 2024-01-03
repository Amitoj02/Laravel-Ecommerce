<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'introduction',
        'description',
        'banner',
        'images',
        'price',
        'on_discount',
        'discount',
        'discount_old_price',
        'product_code',
        'instore_available',
        'online_available',
        'quantity',
        'visible'
    ];

    protected $casts = [
        'images' => 'array',
        'instore_available' => 'boolean',
        'on_discount' => 'boolean',
        'online_available' => 'boolean',
        'visible' => 'boolean'
    ];
    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    public function cartItems(): BelongsToMany {
        //return $this->belongsToMany(CartItem::class, 'cart_items', 'item_id');
        return $this->belongsToMany(CartItem::class);
    }

    public function orders(): HasManyThrough {
        return $this->hasManyThrough(Order::class, CartItem::class);
    }
}
