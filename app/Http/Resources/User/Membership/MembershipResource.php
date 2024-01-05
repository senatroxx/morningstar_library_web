<?php

namespace App\Http\Resources\User\Membership;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MembershipResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $this->image,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'max_borrow_count' => $this->max_borrow_count,
            'max_borrow_weeks' => $this->max_borrow_weeks,
            'fine_per_weeks' => $this->fine_per_weeks,
        ];
    }
}
