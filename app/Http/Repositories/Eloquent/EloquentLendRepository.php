<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Contracts\LendRepository;
use App\Models\Lend;

class EloquentLendRepository implements LendRepository
{
    protected $model;

    public function __construct(Lend $model)
    {
        $this->model = $model;
    }

    public function getLend($userId, int $limit = 10)
    {

        $lend = $this->model
            ->with(['book'])
            ->where('user_id', $userId)
            ->latest();

        return $lend->paginate($limit);
    }

    public function getLendById($id)
    {
        return $this->model
            ->with(['book'])
            ->findOrFail($id);
    }

    public function createLend(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function completeLend($id)
    {
        return $this->getLendById($id)
            ->update(['returned' => true]);
    }

    public function updateLend($id, array $attributes = [])
    {
        return $this->getLendById($id)
            ->update($attributes);
    }

    public function deleteLend($id)
    {
        return $this->getLendById($id)->delete();
    }
}