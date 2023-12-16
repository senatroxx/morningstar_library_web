<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Http\Resources\Admin\User\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $users = $this->service->getUser($request->limit, $request->q);

        return Response::status('success')
            ->message('User retrieved successfully')
            ->result(new UserCollection($users));
    }

    public function store(StoreRequest $request)
    {
        $attributes = $request->validated();

        $this->service->createUser($attributes);

        return Response::status('success')
            ->message('User created successfully')
            ->result();
    }

    public function update(UpdateRequest $request, User $user)
    {
        $attributes = $request->validated();

        $this->service->updateUser($user->id, $attributes);

        return Response::status('success')
            ->message('User updated successfully')
            ->result();
    }

    public function destroy(User $user)
    {
        $this->service->deleteUser($user->id);

        return Response::status('success')
            ->message('User deleted successfully')
            ->result();
    }
}
