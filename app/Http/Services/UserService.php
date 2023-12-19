<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\UserRepository;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getUser($limit = 10, $q = null)
    {
        return $this->repository->getUser($limit, $q);
    }

    public function getUserById($id)
    {
        return $this->repository->getUserById($id);
    }

    public function createUser(array $attributes = [])
    {
        $attributes['password'] = bcrypt($attributes['password']);

        return $this->repository->createUser($attributes);
    }

    public function updateUser($id, array $attributes = [])
    {
        if ($attributes['password'] !== null) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
        }

        return $this->repository->updateUser($id, $attributes);
    }

    public function deleteUser($id)
    {
        return $this->repository->deleteUser($id);
    }

    function changePassword($id, array $attributes = [])
    {
        $user = $this->repository->getUserById($id);

        if (!Hash::check($attributes['old_password'], $user->password)) {
            if (request()->expectsJson()) {
                return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect']);
            }
            return Response::status('failed')
                ->code(401)
                ->message('Current Password is Incorrect.')
                ->result();
        }

        return $this->repository->updateUser($id, [
            'password' => bcrypt($attributes['password']),
        ]);
    }
}
