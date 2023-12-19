<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Http\Services\AuthService;
use App\Mail\VerifyEmail;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function reset(ResetPasswordRequest $request)
    {
        $credentials = $request->validated();

        $this->service->resetPassword($credentials);

        return Response::status('success')
            ->message('Password has been reset. Please login with your new password')
            ->result();
    }

    /**
     * Sending OTP code to verify email address
     *
     * @param VerifyEmailRequest $request
     * @return \App\Helpers\Response
     */
    public function sendOtp(VerifyEmailRequest $request)
    {
        $attributes = $request->validated();

        $this->service->sendOtp($attributes);

        return Response::status('success')
            ->message('OTP code has been sent to your email address')
            ->result();
    }
}
