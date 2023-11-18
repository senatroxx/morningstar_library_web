<?php

namespace App\Http\Resources\Admin\Lend;

use Illuminate\Http\Resources\Json\JsonResource;

class LendResource extends JsonResource
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
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
            'returned' => $this->returned,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],
            'book' => [
                'id' => $this->book->id,
                'title' => $this->book->title,
                'slug' => $this->book->slug,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
