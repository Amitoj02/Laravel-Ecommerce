<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function show() {
        $catalogs = Catalog::whereHas('wishlisted')
            ->where('visible', 'LIKE', '1')
            ->orderBy('id', 'DESC')
            ->get();

        return view('wishlist', [
            'catalogs' => $catalogs
        ]);
    }
}
