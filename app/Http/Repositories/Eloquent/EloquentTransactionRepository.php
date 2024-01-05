<?php

namespace App\Http\Repositories\Eloquent;

use App\Helpers\IdGenerator;
use App\Http\Repositories\Contracts\TransactionRepository;
use App\Models\Transaction;

class EloquentTransactionRepository implements TransactionRepository
{

    protected $model;
    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }
    public function getTransaction(int $limit = 10)
    {
        return $this->model->paginate($limit);
    }

    public function getTransactionById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getTransactionByRefId($refId)
    {
        return $this->model->where('ref_id', $refId)->firstOrFail();
    }

    public function createTransaction(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function updateTransaction($id, array $attributes = [])
    {
        return $this->getTransactionById($id)->update($attributes);
    }

    public function deleteTransaction($id)
    {
        return $this->getTransactionById($id)->delete();
    }

    public function generateRefId()
    {
        return IdGenerator::generate([
            'table' => 'transactions',
            'field' => 'ref_id',
            'length' => 12,
            'prefix' => 'TRX-',
        ]);
    }
}