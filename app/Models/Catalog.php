<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'introduction',
        'description',
        'banner',
        'color',
        'karat',
        'material',
        'type_id',
        'images',
        'product_code',
        'best_seller',
        'is_slide',
        'visible'
    ];

    protected $casts = [
        'images' => 'array',
        'visible' => 'boolean',
        'best_seller' => 'boolean',
        'is_slide' => 'boolean',
    ];
    public function type(): BelongsTo {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function cartItems(): BelongsToMany {
        //return $this->belongsToMany(CartItem::class, 'cart_items', 'item_id');
        return $this->belongsToMany(CartItem::class);
    }

    public function orders(): HasManyThrough {
        return $this->hasManyThrough(Order::class, CartItem::class);
    }

    public function reviews():  HasMany {
        return $this->hasMany(Review::class);
    }

    public function getUserReview(): HasOne
    {
        return $this->reviews()->one()->where('user_id', auth()->id());
    }

    public function wishlisted(): HasOne
    {
        return $this->hasMany(Wishlist::class)->one()->where('user_id', auth()->id());
    }

    public function isWishlisted() {
        return $this->wishlisted()->exists();
    }

    public function addWishlist() {
        if(!$this->isWishlisted()) {
            Wishlist::create([
                'catalog_id' => $this->id,
                'user_id' => auth()->id()
            ]);
        }
    }

    public function removeWishlist() {
        if($this->isWishlisted()) {
            $this->wishlisted()->delete();
        }
    }
}
