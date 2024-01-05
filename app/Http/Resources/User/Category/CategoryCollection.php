<?php

namespace App\Http\Resources\User\Category;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    private $compact;
    private $paginate;

    public function __construct($resource, $compact = false, $paginate = true)
    {
        parent::__construct($resource);
        $this->compact = $compact;
        $this->paginate = $paginate;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $records = $this->collection->transform(function ($item) {
            if ($this->compact) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'slug' => $item->slug,
                ];
            }

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
        });

        if ($this->paginate) {
            return $this->paginate($records);
        }

        return $records;
    }

    private function paginate($records)
    {
        return [
            'current_page' => $this->currentPage(),
            'total_page' => $this->lastPage(),
            'total_records' => $this->total(),
            'records' => $records,
        ];
    }
}
