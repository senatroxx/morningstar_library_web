<?php

namespace App\Http\Resources\User\Category;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
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
                    'slug' => $item->slug,
                    'books' => $item->books()->limit(5)->get()->transform(function ($book) {
                        return [
                            'id' => $book->id,
                            'title' => $book->title,
                            'slug' => $book->slug,
                            'thumbnail' => $book->thumbnail,
                        ];
                    }),
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                ];
            }),
        ];
    }
}
