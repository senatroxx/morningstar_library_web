<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Contracts\MembershipRepository;
use App\Models\Membership;

class EloquentMembershipRepository implements MembershipRepository
{
    protected $model;

    public function __construct(Membership $membership)
    {
        $this->model = $membership;
    }

    public function getMembership(int $limit = 10)
    {
        return $this->model->paginate($limit);
    }

    public function getMembershipById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function createMembership(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function updateMembership($id, array $attributes = [])
    {
        return $this->getMembershipById($id)->update($attributes);
    }

    public function deleteMembership($id)
    {
        return $this->getMembershipById($id)->delete();
    }
}