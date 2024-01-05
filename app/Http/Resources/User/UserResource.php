<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $primaryAddress = $this->primaryAddress();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'balance' => $this->balance,
            'role' => [
                'id' => $this->role->id,
                'name' => $this->role->name,
            ],
            'membership' => $this->membership,
            'primary_address' => $primaryAddress != null ? [
                'id' => $primaryAddress->id,
                'street_address_1' => $primaryAddress->street_address_1,
                'street_address_2' => $primaryAddress->street_address_2,
                'phone' => $primaryAddress->phone,
                'postal_code' => $primaryAddress->postal_code,
                'is_primary' => $primaryAddress->is_primary,
                'city' => [
                    'id' => $primaryAddress->city->id,
                    'name' => $primaryAddress->city->name,
                ],
                'province' => [
                    'id' => $primaryAddress->province->id,
                    'name' => $primaryAddress->province->name,
                ],
                'created_at' => $primaryAddress->created_at,
                'updated_at' => $primaryAddress->updated_at,
            ] : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
