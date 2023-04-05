<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $attributes = $request->validated();

        $user = User::with('role')->where('email', $attributes['email'])->first();

        if (!$user || !Hash::check($attributes['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }

        $role = $user->role->name;

        if (Auth::guard($role)->attempt($attributes)) {
            $request->session()->regenerate();

            return redirect()->intended(route("$role.index"));
        } else {
            throw ValidationException::withMessages(['email' => 'The provided credentials are incorrect.']);
        }
    }
}
