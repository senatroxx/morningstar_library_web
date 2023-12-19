<?php

namespace App\Http\Resources\User\Book;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'published_at' => $this->published_at,
            'quantity' => $this->quantity,
            'categories' => $this->categories != null ? $this->categories->transform(function ($item) {
                return [
                    'name' => $item->name,
                    'slug' => $item->slug,
                ];
            }) : null,
            'authors' => $this->authors != null ? $this->authors->transform(function ($item) {
                return [
                    'name' => $item->name,
                    'slug' => $item->slug,
                ];
            }) : null,
            'publisher' => $this->publisher != null ? [
                'name' => $this->publisher->name ?? null,
                'slug' => $this->publisher->slug ?? null,
            ] : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
