<?php

namespace App\Http\Repositories\Contracts;

interface UserRepository
{
    public function getUser(int $limit = 10, string $q = null);
    public function getUserById($id);
    public function getUserByEmail($email);
    public function createUser(array $attributes = []);
    public function updateUser($id, array $attributes = []);
    public function deleteUser($id);
}
