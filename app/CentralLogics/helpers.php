<?php

use Illuminate\Http\JsonResponse;

function success_api_processor($data, string $message = null, int $code = 200): JsonResponse
{
    return response()->json([
        'status' => true,
        'message' => $message,
        'data' => $data,
    ], $code);
}


function error_api_processor(string $message = null, int $code = 200, $data = null): JsonResponse
{
    return response()->json([
        'status' => false,
        'message' => $message,
        'data' => $data
    ], $code);
}
