<?php

namespace App\Service\ApiResponse;

use Illuminate\Http\JsonResponse;

class ApiResponseService
{
    public function sendResponse($data, $message = [], $code = 200): JsonResponse
    {
        $response = [
            'data' => $data,
            'message' => $message,
            'success' => true,
        ];

        return response()->json($response, $code);
    }

    public function sendError($error, $message = [], $code = 404): JsonResponse
    {
        $response = [
            'errors' => $error,
            'message' => $message,
            'success' => false,
        ];

        return response()->json($response, $code);
    }
}
