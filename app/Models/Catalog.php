<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'color',
        'karat',
        'material',
        'type',
        'images',
        'product_code',
        'visible'
//        'price',
//        'on_discount',
//        'discount',
//        'discount_old_price',
//        'instore_available',
//        'online_available',
//        'quantity',
    ];

    protected $casts = [
        'images' => 'array',
        'visible' => 'boolean'
//        'instore_available' => 'boolean',
//        'on_discount' => 'boolean',
//        'online_available' => 'boolean',
    ];
    public function type(): BelongsTo {
        return $this->belongsTo(Type::class);
    }

    public function cartItems(): BelongsToMany {
        //return $this->belongsToMany(CartItem::class, 'cart_items', 'item_id');
        return $this->belongsToMany(CartItem::class);
    }

    public function orders(): HasManyThrough {
        return $this->hasManyThrough(Order::class, CartItem::class);
    }
}
