<?php

namespace App\Http\Resources\User\Lend;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LendCollection extends ResourceCollection
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
                    'start_date' => $item->start_date,
                    'finish_date' => $item->finish_date,
                    'book' => [
                        'id' => $item->book->id,
                        'title' => $item->book->title,
                    ],
                    'returned' => $item->returned,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
                ];
            }),
        ];
    }
}
