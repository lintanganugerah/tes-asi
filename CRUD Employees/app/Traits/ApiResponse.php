<?php

namespace App\Traits;

trait ApiResponse
{
    public function successResponse($data = null, $message = 'success', $statusCode = 200)
    {
        return response()->json([
            "success" => true,
            "message" => $message,
            "data" => $data
        ], $statusCode);
    }

    public function errorResponse($message = 'Error', $errors = [], $statusCode = 500)
    {
        return response()->json([
            "success" => false,
            "message" => $message,
            "error" => $errors
        ], $statusCode);
    }
}
