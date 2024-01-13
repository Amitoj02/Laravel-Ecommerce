<?php

namespace App\Http\Controllers;

use App\Models\Catalog;

class BrowseController extends Controller
{
    public function show() {
        $slides = Catalog::query()
            ->where('is_slide', 'LIKE', '1')
            ->where('visible', 'LIKE', '1')
            ->orderBy('id', 'DESC')
            ->get();

        return view('browse', [
            'slides' => $slides
        ]);
    }
    //
}
