<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __invoke(Request $request): JsonResponse
    {
        return response()->json($request->user());
    }
}
