<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Contracts\UserRepository;
use App\Models\User;

class EloquentUserRepository implements UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUser($limit = 10, $q = null)
    {
        $user = $this->model->query();

        $user = $user->with('role');

        if ($q) {
            $user = $user->like('name', $q);
        }

        return $user->paginate($limit);
    }

    public function getUserById($id)
    {
        return $this->model->with('role')->where('id', $id)->firstOrFail();
    }

    public function createUser(array $attributes = [])
    {
        $user = $this->model->create($attributes);

        return $user;
    }

    public function updateUser($id, array $attributes = [])
    {
        $user = $this->getUserById($id);

        return $user->update($attributes);
    }

    public function deleteUser($id)
    {
        return $this->getUserById($id)->delete();
    }
}
