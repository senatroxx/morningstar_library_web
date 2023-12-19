<?php

namespace App\Http\Repositories\Contracts;

interface LendRepository
{
    public function getLend($userId, int $limit = 10);
    public function getLendById($id);
    public function createLend(array $attributes = []);
    public function completeLend($id);
    public function updateLend($id, array $attributes = []);
    public function deleteLend($id);
}
