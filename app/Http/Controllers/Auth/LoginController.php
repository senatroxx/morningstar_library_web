<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Services\AuthService;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Vite;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function show()
    {
        SEOTools::webPage(
            'Login',
            'Login to explore your next favorite book!',
            'website',
            [Vite::asset('resources/images/library.png')]
        );

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $attributes = $request->validated();

        // $user = User::with('role')->where('email', $attributes['email'])->first();

        // if (!$user || !Hash::check($attributes['password'], $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => 'The provided credentials are incorrect.',
        //     ]);
        // }

        // $role = $user->role->name;

        // if (Auth::guard($role)->attempt($attributes)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended(route("$role.index"));
        // } else {
        //     throw ValidationException::withMessages(['email' => 'The provided credentials are incorrect.']);
        // }

        return $this->service->login($attributes);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.index');
    }
}
