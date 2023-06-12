<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\PasswordRequest;
use App\Http\Requests\User\Profile\UpdateRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('user.profile.index', compact('user'));
    }

    public function update(UpdateRequest $request)
    {
        $attributes = $request->validated();

        $user = auth()->user();

        $user->update($attributes);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function changePassword(PasswordRequest $request)
    {
        $attributes = $request->validated();

        $user = auth()->user();

        if (!Hash::check($attributes['old_password'], $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect']);
        }

        $user->update([
            'password' => Hash::make($attributes['password']),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
