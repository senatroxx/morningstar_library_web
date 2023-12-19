<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Http\Services\AuthService;

class PasswordController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('auth.forgot');
    }

    public function reset(ResetPasswordRequest $request)
    {
        $credentials = $request->validated();

        $this->service->resetPassword($credentials);

        return redirect()->route('login')->with('success', 'Password has been reset. Please login with your new password');
    }

    /**
     * Sending OTP code to verify email address
     *
     * @param VerifyEmailRequest $request
     * @return 
     */
    public function sendOtp(VerifyEmailRequest $request)
    {
        $attributes = $request->validated();

        $this->service->sendOtp($attributes);

        return redirect()->back()
            ->with('success', 'OTP code has been sent to your email address')
            ->with('email', $attributes['email']);
    }
}
