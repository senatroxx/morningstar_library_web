<?php

namespace App\Http\Resources\User\Transaction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request) : array
    {
        return [
            'current_page' => $this->currentPage(),
            'total_page' => $this->lastPage(),
            'total_records' => $this->total(),
            'records' => $this->collection->transform(function ($item) {
                return [
                    'id' => $item->id,
                    'ref_id' => $item->ref_id,
                    'ivnoice_id' => $item->invoice_id,
                    'invoice_url' => $item->invoice_url,
                    'payment_method' => $item->payment_method,
                    'status' => $item->status,
                    'membership' => $item->membership,
                    'expired_at' => $item->expired_at,
                    'lend_report' => $item->lend_report,
                    'lend' => $item->lend,
                    'paid_at' => $item->paid_at,
                ];
            }),
        ];
    }
}
