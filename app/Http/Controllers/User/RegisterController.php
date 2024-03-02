<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Service\User\UserService;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, UserService $service): JsonResponse
    {
        $data = $request->validated();
        $response = $service->register($data);
        return $this->apiResponse->sendResponse(
            $response,
            'Register complete',
            201
        );
    }
}
