<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller {
    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $validatedUserAttr = $request->validate([
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'email'      => ['required', 'email'],
            'password'   => ['required', 'min:6', 'confirmed'],
        ]);

        $newUser = User::create($validatedUserAttr);

        Auth::login($newUser);

        return redirect('/jobs');
    }
}
