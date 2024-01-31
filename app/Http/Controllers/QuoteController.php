<?php

namespace App\Http\Controllers;

use App\Filament\Resources\OrderResource;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
use App\Notifications\QuoteCompleted;
//use Filament\Notifications\Actions\Action;
//use Filament\Notifications\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class QuoteController extends Controller
{
    public function details() {

        $cartItems = CartItem::query()
            ->where('user_id', Auth::id())
            ->whereNull('order_id')
            ->get();

        if(count($cartItems) === 0) {
            return redirect()->route('index');
        }

        return view('quote/quote-details', [
            'cartItems' => $cartItems
        ]);
    }

    public function submit(Request $request): RedirectResponse
    {

        $request->validate([
            'recipient_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits:10'],
            'message' => ['nullable', 'string', 'max:2000'],
            'address_street' => ['nullable', 'string', 'max:70'],
            'address_city' => ['nullable', 'string', 'max:50'],
            'address_state' => ['nullable', 'string', 'max:50'],
            'address_code' => ['nullable', 'string', 'max:50'],
        ]);

        if($request->address_city) {
            $address = $request->address_street . ', ' . $request->address_city .', '. $request->address_state .' ('. $request->address_code .')';
        } else {
            $address = '';
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'recipient_name' => $request->recipient_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'message' => $request->message,
            'address' => $address,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $cartCount = CartItem::query()
            ->where('user_id', Auth::id())
            ->whereNull('order_id')
            ->update(['order_id' => $order->id]);

        $admins = User::query()->where('is_admin', 'LIKE', true)->get();

        Notification::send($admins, new QuoteCompleted($order));

//        Notification::make()
//            ->title('New Quote')
//            ->icon('heroicon-o-shopping-bag')
//            ->body("{$order->user->name} requested new quote.")
//            ->actions([
//                Action::make('View')
//                    ->url(OrderResource::getUrl('view', ['record' => $order])),
//            ])
//            ->sendToDatabase($admins);

        return redirect()->route('quote-complete', ['order_id' => $order->id]);
    }

    public function complete($order_id)
    {
        $order = Order::query()
            ->where('id', $order_id)
            ->where('user_id', Auth::id())
            ->first();

        if($order){
            return view('quote/quote-complete', [
                'order' => $order
            ]);
        } else {
            abort(404);
        }

//        return redirect()->route('index');
    }
}
