<?php

namespace App\Http\Controllers;

use App\Mail\SmtpMailer;
use App\Models\Catalog;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Password as FascadePassword;
use Illuminate\Validation\ValidationException;
use PHPMailer\PHPMailer\Exception;

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

    /**
     * @throws Exception
     * @throws ValidationException
     */
    public function register(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'address' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits:10']
        ])->validateWithBag('register');

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        $user->sendVerificationEmail();

//        Auth::login($user);
//        event(new Registered($user));

        return redirect()->back()->withErrors([
            'verified' => 'Account Created',
            ], 'login');
    }

    public function login(Request $request): RedirectResponse
    {
        //May require email, password, and (optional) remember
        if (Auth::attempt($request->only('email', 'password'), $request->input('remember'))) {

            if(Auth::user()->hasVerifiedEmail()) {
                // Authentication passed
                $request->session()->regenerate();
                return redirect()->back();
            } else {
                Auth::logout();
                return back()
                    ->withErrors([
                        'verified' => 'Email not verified',
                    ], 'login')
                    ->withInput($request->only('email', 'remember'));
            }

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
        return redirect()->back();
    }

    public function emailResetPassword(Request $request): RedirectResponse {
        $request->validate(['email' => 'required|email']);

        $status = FascadePassword::sendResetLink(
            $request->only('email'),

            function (CanResetPassword $user, string $token): void {
                $url = url(route('password.reset', [
                    'token' => $token,
                    'email' => $user->getEmailForPasswordReset(),
                ], false));

                $mail = new SmtpMailer();
                $mail->addAddress($user->getEmailForPasswordReset());
                $mail->Subject = 'Reset Password for Swarn Abhishek Account';
                $mail->Body = 'Please <a href="' . $url . '">click here</a> to reset password for your Swarn Abhishek website account. This password reset link will expire in 1 hour. <br><br>If it was not you, please ignore this email.';
                $mail->send();
            }
        );



        return $status === FascadePassword::RESET_LINK_SENT
            ? back()->with(['forgot_password_status' => __($status)])
            : back()->withErrors(['forgot_password' => __($status)], 'forgot_password');
    }

    public function resetPassword(string $token) {
        return view('password', [
            'token' => $token
        ]);
    }

    public function updatePassword(Request $request): RedirectResponse {

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::defaults()]
        ]);

        $status = FascadePassword::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        return $status === FascadePassword::PASSWORD_RESET
            ? redirect()->route('index')->withErrors([], 'login')
            : back()->withErrors(['email' => [__($status)]]);
//        return redirect()->route('index')->withErrors([], 'login');
    }

}
