<?php

namespace App\Http\Resources\User\Membership;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MembershipCollection extends ResourceCollection
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
                    'name' => $item->name,
                    'slug' => $item->slug,
                    'description' => $item->description,
                    'image' => $item->image,
                    'price' => $item->price,
                    'discount_price' => $item->discount_price,
                    'max_borrow_count' => $item->max_borrow_count,
                    'max_borrow_weeks' => $item->max_borrow_weeks,
                    'fine_per_weeks' => $item->fine_per_weeks,
                ];
            }),
        ];
    }
}
