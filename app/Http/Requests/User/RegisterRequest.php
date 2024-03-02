<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:55', 'unique:users'],
            'email' => ['required', 'email:rfc,dns', 'min:6', 'max:55', 'unique:'.User::class],
            'role' => ['required', 'string', 'min:3', 'max:15', 'in:user,manager'],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'role' => strtolower($this->role),
        ]);
    }
}
