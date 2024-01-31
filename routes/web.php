<?php

use App\Http\Controllers\BrowseController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::post('/register', [HomeController::class, 'register'])->name('register');

Route::get('/login', [HomeController::class, 'index']);
Route::post('/login', [HomeController::class, 'login'])->name('login');

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/browse', [BrowseController::class, 'show'])->name('browse');
Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/404', function () {
    return view('errors.404');
})->name('error-404');

//Route::get('/order', function () {
//    return view('order');
//})->name('order');

Route::get('/igi', function () {
    return view('igi');
})->name('igi');

Route::get('/catalog/{product_code}', [CatalogController::class, 'show'])->name('catalog');

Route::post('/catalog/{product_code}', [CatalogController::class, 'addToCart'])->name('addToCart');

Route::post('/catalog/{product_code}/review', [CatalogController::class, 'addReview'])->name('addReview');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile-update');

    Route::get('/quote/details', [QuoteController::class, 'details'])->name('quote-details');
    Route::post('/quote/details', [QuoteController::class, 'submit'])->name('quote-details-submit');
    Route::get('/quote/complete/{order_id}', [QuoteController::class, 'complete'])->name('quote-complete');

});



require __DIR__.'/auth.php';
