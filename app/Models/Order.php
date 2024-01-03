<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'recipient_name', 'transaction_id', 'notes', 'address', 'phone_number', 'total_price', 'total_items', 'status'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function cartItems(): HasMany {
        return $this->hasMany(CartItem::class, 'order_id');
        //return $this->hasMany(CartItem::class, 'item_id');
    }

    public function catalogs(): HasManyThrough {
        return $this->hasManyThrough(Catalog::class, CartItem::class, 'item_id', 'id');
    }

}
