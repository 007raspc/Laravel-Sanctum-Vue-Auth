<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Service\User\UserService;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(Request $request, UserService $service)
    {
        $service->logout($request);

        return $this->apiResponse->sendResponse(
            [],
            'Logout success'
        );
    }
}
