<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'required', 'min:3', 'max:55', 'unique:users'],
            'email' => ['required', 'email:rfc,dns', 'min:6', 'max:55', 'unique:users'],
            'role' => ['required', Rule::in(['user', 'manager'])],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                Password::defaults(),
            ]
        ];
    }

}
