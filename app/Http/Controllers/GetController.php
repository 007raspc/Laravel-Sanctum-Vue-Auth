<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
//        return response()->json($request->user());
        return $this->apiResponse->sendResponse(
            $request->user(),
            'Login success'
        );
    }

}
