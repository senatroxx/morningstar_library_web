<?php

namespace App\Http\Resources\User\Book;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCollection extends ResourceCollection
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
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'thumbnail' => $item->thumbnail,
                    'published_at' => $item->published_at,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                ];
            }),
        ];
    }
}
