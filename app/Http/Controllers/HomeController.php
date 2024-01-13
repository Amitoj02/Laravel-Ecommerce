<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $slides = Catalog::query()
            ->where('is_slide', 'LIKE', '1')
            ->where('visible', 'LIKE', '1')
            ->get();

        $types = Type::query()->orderBy('name', 'ASC')->get();

        $latestCatalogs = Catalog::query()
            ->where('visible', 'LIKE', '1')
            ->take(10)
            ->orderByDesc('id')
            ->get();

        $bestSellers = Catalog::query()
            ->where('best_seller', 'LIKE', '1')
            ->where('visible', 'LIKE', '1')
            ->orderByDesc('id')
            ->get();


        return view('home', [
            'slides' => $slides,
            'types' => $types,
            'latestCatalogs' => $latestCatalogs,
            'bestSellers' => $bestSellers
        ]);

    }
}
