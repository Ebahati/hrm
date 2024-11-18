<?php


use Illuminate\Http\JsonResponse;

if (! function_exists('success_api_processor')) {
    function success_api_processor($data, string $message = null, int $code = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}

if (! function_exists('error_api_processor')) {
    function error_api_processor(string $message = null, int $code = 200, $data = null): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}

if (! function_exists('process_response')) {
    function process_response(bool $success, string $message, $data = null, int $code = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => $success,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
