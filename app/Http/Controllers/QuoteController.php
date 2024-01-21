<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        $order_id = DB::table('orders')->insertGetId([
            'user_id' => Auth::id(),
            'recipient_name' => $request->recipient_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'message' => $request->message,
            'address' => $address,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        CartItem::query()
            ->where('user_id', Auth::id())
            ->whereNull('order_id')
            ->update(['order_id' => $order_id]);

        return redirect()->route('quote-complete', ['order_id' => $order_id]);
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
        }

        return redirect()->route('index');
    }
}
