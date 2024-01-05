<?php

namespace App\Http\Repositories\Contracts;

interface TransactionRepository
{
    public function getTransaction(int $limit = 10);
    public function getTransactionById($id);
    public function getTransactionByRefId($refId);
    public function createTransaction(array $attributes = []);
    public function updateTransaction($id, array $attributes = []);
    public function deleteTransaction($id);
    public function generateRefId();
}