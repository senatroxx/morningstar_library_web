<?php

namespace App\Http\Resources\Admin\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'current_page' => $this->currentPage(),
            'total_page' => $this->lastPage(),
            'total_records' => $this->total(),
            'records' => $this->collection->transform(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'email' => $item->email,
                    'address' => $item->address,
                    'role' => [
                        'id' => $item->role->id,
                        'name' => $item->role->name,
                    ],
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                ];
            }),
        ];
    }
}
