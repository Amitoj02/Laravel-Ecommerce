<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CartItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'item_id';
    protected $fillable = ['catalog_id', 'quantity', 'user_id', 'message', 'order_id'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function catalog(): BelongsTo {
        return $this->BelongsTo(Catalog::class, 'catalog_id');
    }

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class, 'order_id');
    }

}
