<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Mail\VerifyEmail;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot');
    }

    public function reset(ResetPasswordRequest $request)
    {
        $credentials = $request->validated();

        EmailVerification::where('type', 'FORGOT_PASSWORD')->where('email', $credentials['email'])->delete();

        $user = User::where('email', $credentials['email'])->first();
        $user->password = bcrypt($credentials['password']);
        $user->save();

        return redirect()->route('login')->with('success', 'Password has been reset. Please login with your new password');
    }

    /**
     * Sending OTP code to verify email address
     *
     * @param VerifyEmailRequest $request
     * @return App\Helpers\Response
     */
    public function sendOtp(VerifyEmailRequest $request)
    {
        $attributes = $request->validated();
        $attributes['type'] = 'FORGOT_PASSWORD';
        $attributes['otp'] = random_int(100000, 999999);

        EmailVerification::updateOrCreate(
            ['email' => $attributes['email'], 'type' => $attributes['type']],
            ['otp' => $attributes['otp']]
        );

        Mail::to($attributes['email'])->send(new VerifyEmail($attributes));

        return redirect()->back()
            ->with('success', 'OTP code has been sent to your email address')
            ->with('email', $attributes['email']);
    }
}
