<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TokenController extends Controller
{
    public function store(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = null;
        if (isset($data['email'])) {
            $user = User::where('email', $data['email'])->first();
        }
        if (isset($data['name'])) {
            $user = User::where('name', $data['name'])->first();
        }

        if (is_null($user) || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'username' => 'The provided credentials are incorrect.',
            ]);
        }

        return $this->apiResponse->sendResponse(
            ['token' => $user->createToken($data['device_name'])->plainTextToken],
            'New auth token'
        );
    }

    public function destroy(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return $this->apiResponse->sendResponse(
            [],
            'Token deleted'
        );
    }
}
