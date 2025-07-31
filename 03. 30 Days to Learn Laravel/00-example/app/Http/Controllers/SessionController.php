<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller {
    public function create() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $validatedCredentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($validatedCredentials)) {
           throw ValidationException::withMessages([
               'password' => 'Wrong password'
           ]);
        }

        // It's a security measure against session hijacking:
        $request->session()->regenerate();

        return redirect('/jobs');
    }

    public function destroy(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
