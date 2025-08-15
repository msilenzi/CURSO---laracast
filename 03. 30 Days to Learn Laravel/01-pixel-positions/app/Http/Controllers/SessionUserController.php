<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionUserController extends Controller {
    public function create(): View {
        return view('auth.login');
    }

    public function store(Request $request) {
        $attributes = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match',
            ]);
        }

        $request->session()->regenerate();
        return redirect("/");
    }

    public function destroy() {
        Auth::logout();
        return redirect("/");
    }
}
