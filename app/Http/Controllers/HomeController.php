<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

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

    public function register(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'max_digits:10']
        ])->validateWithBag('register');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('index');
    }

    public function login(Request $request): RedirectResponse
    {
        //May require email, password, and (optional) remember
        if (Auth::attempt($request->only('email', 'password'), $request->input('remember'))) {
            // Authentication passed
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        // Authentication failed
        return back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ], 'login')
            ->withInput($request->only('email', 'remember'));

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
