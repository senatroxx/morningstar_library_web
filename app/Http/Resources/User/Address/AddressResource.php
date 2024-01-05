<?php

namespace App\Http\Resources\User\Address;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'street_address_1' => $this->street_address_1,
            'street_address_2' => $this->street_address_2,
            'phone' => $this->phone,
            'postal_code' => $this->postal_code,
            'is_primary' => $this->is_primary,
            'province' => $this->province->name,
            'city' => $this->city->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
