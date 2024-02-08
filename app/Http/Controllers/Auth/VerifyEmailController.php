<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(FormRequest $request): RedirectResponse
    {
        $user = User::find($request->route('id'));

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

//        return redirect($this->redirectPath())->with('verified', true);

//        if ($request->user()->hasVerifiedEmail()) {
//            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
//        }
//
//        if ($request->user()->markEmailAsVerified()) {
//            event(new Verified($request->user()));
//        }

        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
