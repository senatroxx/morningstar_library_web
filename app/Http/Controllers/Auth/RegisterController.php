<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Role;
use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $attributes = $request->validated();

        User::create([
            ...$attributes,
            'password' => bcrypt($attributes['password']),
            'role_id' => Role::where('name', 'user')->first()->id,
        ]);

        return redirect()->route('login');
    }
}
