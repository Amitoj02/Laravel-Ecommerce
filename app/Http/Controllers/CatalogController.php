<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

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
            ->take(10)
            ->get();


        return view('item', [
            'catalog' => $catalog,
            'relatedCatalogs' => $relatedCatalogs
        ]);

    }
}
