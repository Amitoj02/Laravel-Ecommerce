<?php

namespace App\Livewire;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $cartItems;

    public function render()
    {
        $this->cartItems = CartItem::query()
            ->where('user_id', Auth::id())
            ->whereNull('order_id') //Because order_id is issued when cart is submitted
            ->get();

        return view('livewire.shopping-cart');
    }

    public function remove($item_id) {
        CartItem::query()
            ->where('item_id', $item_id)
            ->delete();
    }

}
