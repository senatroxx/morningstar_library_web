<?php

namespace App\Http\Requests\Admin\Lend;

use App\Helpers\FormRequest;

class LendRequest extends FormRequest
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
            'range' => 'required',
            'returned' => 'required',
            'user_id' => 'required|integer|exists:users,id',
            'book_id' => 'required|integer|exists:books,id',
        ];
    }
}
