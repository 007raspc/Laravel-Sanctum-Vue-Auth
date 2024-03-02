<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\UserResource;
use App\Service\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, UserService $service): JsonResponse
    {
        $data = $request->validated();
        $user = $service->getUserForLogin($data);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return $this->apiResponse->sendError(
                ValidationException::withMessages([
                    'username' => 'The provided credentials are incorrect.',
                ]),
                'Error in login',
                401
            );
        }

        return $this->apiResponse->sendResponse(
            [
                'user' => UserResource::make($user),
                'access_token' => $user->createToken($data['device_name'])->plainTextToken,
            ],
            'Login success'
        );
    }
}
