<?php

namespace App\Http\Resources\User\Transaction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request) : array
    {
        return [
            'id' => $this->id,
            'ref_id' => $this->ref_id,
            'ivnoice_id' => $this->invoice_id,
            'invoice_url' => $this->invoice_url,
            'payment_method' => $this->payment_method,
            'status' => $this->status,
            'membership' => $this->membership,
            'expired_at' => $this->expired_at,
            'lend_report' => $this->lend_report,
            'lend' => $this->lend,
            'paid_at' => $this->paid_at,
        ];
    }
}
