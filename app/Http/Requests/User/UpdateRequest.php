<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateRequest extends FormRequest
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
            'name' => [
                'string',
                'required',
                'min:3',
                'max:55',
                Rule::unique('users')->ignore($this->user()),
            ],
            'phone' => ['integer', 'nullable', 'digits_between:5,11'],
            'role' => ['required', Rule::in(['user', 'manager'])],
            'avatar' => ['array', 'nullable', 'max:1'],
            'avatar.0' => ['url', 'nullable'],
        ];
    }

}
