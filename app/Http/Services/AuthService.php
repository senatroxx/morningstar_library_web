<?php

namespace App\Http\Services;

use App\Helpers\Response;
use App\Http\Repositories\Contracts\UserRepository;
use App\Http\Resources\User\UserResource;
use App\Mail\VerifyEmail;
use App\Models\EmailVerification;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function login(array $attributes = [])
    {
        $user = $this->repository->getUserByEmail($attributes['email']);

        if (! $user || ! Hash::check($attributes['password'], $user->password)) {
            if (request()->expectsJson()) {
                return Response::status('failed')
                    ->code(401)
                    ->message('The provided credentials are incorrect.')
                    ->result();
            }

            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }


        $role = $user->role->name;

        if (request()->expectsJson()) {

            $token = $user->createToken($user->email . '-' . now(), [$role]);
            $expires = now()->diffInSeconds($token->token->expires_at);

            return Response::status('success')
                ->message('Successfuly login.')
                ->result([
                    "token" => $token->accessToken,
                    "expires_in" => $expires,
                    "user" => new UserResource($user),
                ]);
        } else {

            if (Auth::guard($role)->attempt($attributes)) {
                request()->session()->regenerate();

                return redirect()->intended(route("$role.index"));
            } else {
                throw ValidationException::withMessages(['email' => 'The provided credentials are incorrect.']);
            }
        }
    }

    public function register(array $attributes = [])
    {
        return $this->repository->createUser([
            ...$attributes,
            'password' => bcrypt($attributes['password']),
            'role_id' => Role::where('name', 'user')->first()->id,
        ]);
    }

    public function resetPassword(array $attributes)
    {
        EmailVerification::where('type', 'FORGOT_PASSWORD')->where('email', $attributes['email'])->delete();

        $user = $this->repository->getUserByEmail($attributes['email']);
        $user->password = bcrypt($attributes['password']);
        return $user->save();
    }

    public function sendOtp(array $attributes)
    {
        $attributes['type'] = 'FORGOT_PASSWORD';
        $attributes['otp'] = random_int(100000, 999999);

        EmailVerification::updateOrCreate(
            ['email' => $attributes['email'], 'type' => $attributes['type']],
            ['otp' => $attributes['otp']]
        );

        return Mail::to($attributes['email'])->send(new VerifyEmail($attributes));
    }
}