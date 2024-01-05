<?php

namespace App\Http\Repositories\Contracts;

interface MembershipRepository
{
    public function getMembership(int $limit = 10);

    public function getMembershipById($id);

    public function createMembership(array $attributes = []);

    public function updateMembership($id, array $attributes = []);

    public function deleteMembership($id);
}