<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return $this->apiResponse->sendResponse(
            $request->user(),
            'Login success'
        );
    }

}
