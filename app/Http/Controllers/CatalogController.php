<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Catalog;
use App\Models\Review;
use App\Models\User;
use App\Notifications\CatalogReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class CatalogController extends Controller
{
    public function show($product_code){

        $catalog = Catalog::query()
            ->where('product_code', $product_code)
            ->where('visible', 'LIKE', '1')
            ->first();

        if(empty($catalog)) {
            abort(404);
        }

        $relatedCatalogs = Catalog::query()
            ->where('gender', $catalog->gender)
            ->where('type_id', $catalog->type_id)
            ->where('visible', 'LIKE', '1')
            ->take(10)
            ->get();

        $reviews = $catalog->reviews()->orderBy('updated_at', 'DESC')->get();
        if($reviews->count() === 0) {
            $averageStars = 5;
        } else {
            $averageStars = intval(round($reviews->pluck('star')->avg()));
        }


        $userReview = new Review;

        if(Auth::check()) {
            if($catalog->getUserReview()->exists()) {
                $userReview = $catalog->getUserReview()->first();
            }
        }


        return view('item', [
            'catalog' => $catalog,
            'relatedCatalogs' => $relatedCatalogs,
            'reviews' => $reviews,
            'averageStars' => $averageStars,
            'userReview' => $userReview,
        ]);

    }

    public function addReview(Request $request): RedirectResponse
    {

        Validator::make($request->all(), [
            'title' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:2000'],
            'star' => ['required', 'numeric', 'min:1', 'max:5', 'digits:1'],
            'catalog_id' => ['exists:catalogs,id']
        ])->validateWithBag('review');

        $review = Review::query()->where('catalog_id', $request->catalog_id)->where('user_id', auth()->id());

        if($review->exists()) {
//            $review->title = $request->title;
//            $review->message = $request->message;
//            $review->star = $request->star;
            $review->update([
                'title' => $request->title,
                'message' => $request->message,
                'star' => $request->star,
            ]);

            $review = $review->first();

        } else {
            //Review dont exists
            $review = Review::create([
                'title' => $request->title,
                'message' => $request->message,
                'star' => $request->star,
                'catalog_id' => $request->catalog_id,
                'user_id' => auth()->id()
            ]);
        }

        $admins = User::query()->where('is_admin', 'LIKE', true)->get();
        Notification::send($admins, new CatalogReview($review));

        return redirect()->back()->with( ['review_added' => true] );
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
