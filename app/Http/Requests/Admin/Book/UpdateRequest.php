<?php

namespace App\Http\Requests\Admin\Book;

use App\Helpers\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules() : array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,svg',
            'quantity' => 'required|numeric',
            'publisher_id' => 'required|exists:publishers,id',
            'published_at' => 'required|date',
            'authors_id' => 'required|array',
            'authors_id.*' => 'required|exists:authors,id',
            'categories_id' => 'required|array',
            'categories_id.*' => 'required|exists:categories,id',
        ];
    }
}
