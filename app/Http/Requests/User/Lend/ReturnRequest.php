<?php

namespace App\Http\Requests\User\Lend;

use App\Helpers\FormRequest;

class ReturnRequest extends FormRequest
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
            "return_courier" => "required|string",
            "return_receipt" => "required|string",
        ];
    }
}
