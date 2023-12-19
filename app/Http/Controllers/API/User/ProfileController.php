<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\PasswordRequest;
use App\Http\Requests\User\Profile\UpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Services\UserService;

class ProfileController extends Controller
{
    protected $service;
    protected $user;

    public function __construct(UserService $service)
    {
        $this->user = auth('api')->user();
        $this->service = $service;
    }

    public function index()
    {
        return Response::status('success')
            ->message('Profile retrieved successfully')
            ->result(new UserResource($this->user));
    }

    public function update(UpdateRequest $request)
    {
        $attributes = $request->validated();

        $this->service->updateUser($this->user->id, $attributes);

        return Response::status('success')
            ->message('Profile updated successfully')
            ->result();
    }

    public function changePassword(PasswordRequest $request)
    {
        $attributes = $request->validated();

        $this->service->changePassword($this->user->id, $attributes);

        return Response::status('success')
            ->message('Password changed successfully')
            ->result();
    }
}
