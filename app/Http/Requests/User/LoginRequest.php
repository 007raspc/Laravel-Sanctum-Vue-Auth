<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['sometimes', 'required', 'email', 'min:3', 'max:55'],
            'name' => ['sometimes', 'required', 'string', 'min:5', 'max:125'],
            'password' => ['string', 'required', 'min:8', 'max:30'],
            'remember' => ['boolean'],
            'device_name' => ['string', 'required', 'max:10']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            filter_var($this->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name' => $this->username,
        ]);
    }
}
