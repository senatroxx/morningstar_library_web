<?php

namespace App\Http\Requests\Auth;

use App\Helpers\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'address' => 'required|string',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
        ];
    }
}
