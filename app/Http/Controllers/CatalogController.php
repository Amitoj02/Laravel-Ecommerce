<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Catalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CatalogController extends Controller
{
    public function show($product_code){

        $catalog = Catalog::query()
            ->where('product_code', $product_code)
            ->where('visible', 'LIKE', '1')
            ->first();

        $relatedCatalogs = Catalog::query()
            ->where('gender', $catalog->gender)
            ->where('type_id', $catalog->type_id)
            ->where('visible', 'LIKE', '1')
            ->take(10)
            ->get();

        return view('item', [
            'catalog' => $catalog,
            'relatedCatalogs' => $relatedCatalogs
        ]);

    }

    public function addToCart(Request $request): RedirectResponse
    {
        if($request->quantity <= 0) {
            return redirect()->back()->withErrors(['cart'=>'Quantity should be higher than 0']);
        }

        if(!Catalog::where('id', $request->catalog_id)->exists()) {
            return redirect()->back()->withErrors(['cart'=>'The catalog item not exists']);
        }

        CartItem::create([
            'catalog_id' => $request->catalog_id,
            'quantity' => $request->quantity,
            'message' => $request->message,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with( ['item_added' => true] );
    }
}
