<?php

namespace App\Http\Resources\User\Category;

use App\Http\Resources\User\Book\BookCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    protected $limit;

    public function paginate($limit)
    {
        $this->limit = $limit;

        return $this;
    }

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
            'name' => $this->name,
            'slug' => $this->slug,
            'books' => new BookCollection($this->books()->paginate($request->limit ?? 20)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
