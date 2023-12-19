<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\AuthService;

class RegisterController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function store(RegisterRequest $request)
    {
        $attributes = $request->validated();

        $this->service->register($attributes);

        return Response::status('success')
            ->message('Successfuly register.')
            ->result();
    }
}
