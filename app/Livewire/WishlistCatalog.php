<?php

namespace App\Livewire;

use App\Models\Catalog;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class WishlistCatalog extends Component
{
    public Catalog $catalog;
    public function render()
    {
//        dd($this->catalog->wishlisted());
        return view('livewire.wishlist-catalog');
    }

    public function add(){
        $this->validateAccess();
        $this->catalog->addWishlist();
    }

    public function remove() {
        $this->validateAccess();
        $this->catalog->removeWishlist();
    }

    private function validateAccess(): void
    {
        if (auth()->guest()) {
            throw ValidationException::withMessages([
                'unauthenticated' => 'You need to <a href="' . route('login') . '" class="underline">login</a> to click like/dislike.'
            ]);
        }
    }

}
