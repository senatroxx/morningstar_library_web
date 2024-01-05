<?php

namespace App\Http\Requests\User\Lend;

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
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
            'books' => 'required|array',
            'books.*' => 'required|exists:books,id|min:1',
            'user_address_id' => 'required|exists:user_addresses,id',
            'courier' => 'required|in:jne,tiki,pos',
            'courier_service' => 'required',
        ];
    }
}
