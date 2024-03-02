<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Service\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CheckLoginController extends Controller
{
    public function __invoke(Request $request, UserService $service): JsonResponse
    {
        $user = $request->user();
        if (is_null($user)) {
            return $this->apiResponse->sendError(
                [],
                'Unauthorized.',
                401
            );
        }
        return $this->apiResponse->sendResponse(
            ['user' => UserResource::make($user)],
            'Auth checked.'
        );
    }
}
