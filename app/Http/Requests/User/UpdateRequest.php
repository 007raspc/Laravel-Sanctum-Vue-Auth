<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['string', 'required', 'min:3', 'max:55'],
            'email' => ['email', 'required', 'min:3', 'max:55', 'exists:users,email'],
            'role' => ['required', Rule::in(['manager', 'agent', 'visitor'])],
            'avatar' => ['array', 'nullable', 'max:1'],
            'avatar.0' => ['url', 'nullable'],
        ];
    }

}
