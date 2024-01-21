<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile(): View{
        return view('profile');
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits:10']
        ]);

        User::query()
            ->where('id', Auth::id())
            ->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'address' => $request->address,
                'phone_number' => $request->phone_number
            ]);

        return redirect()->route('profile')->with('updated', true);
    }
}
