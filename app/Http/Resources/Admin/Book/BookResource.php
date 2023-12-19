<?php

namespace App\Http\Resources\Admin\Book;

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
            'categories' => $this->categories->transform(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'slug' => $item->slug,
                ];
            }),
            'authors' => $this->authors->transform(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'slug' => $item->slug,
                ];
            }),
            'publisher' => $this->publisher !== null ? [
                'id' => $this->publisher->id,
                'name' => $this->publisher->name,
                'slug' => $this->publisher->slug,
            ] : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
