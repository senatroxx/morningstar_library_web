<?php

namespace App\Http\Resources\User\Address;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AddressCollection extends ResourceCollection
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
                    'street_address_1' => $item->street_address_1,
                    'street_address_2' => $item->street_address_2,
                    'phone' => $item->phone,
                    'postal_code' => $item->postal_code,
                    'is_primary' => $item->is_primary,
                    'province' => $item->province->name,
                    'city' => $item->city->name,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                ];
            }),
        ];
    }
}
