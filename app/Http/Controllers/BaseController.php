<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorResponse; // Ensure ErrorResponse is included
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    public function apiSuccess($data = [], $code = 200): JsonResponse
    {
        return response()->json(array_merge([
            'status' => 'success',
            'message' => '',
        ], ['data' => $data]), $code);
    }

    public function apiError($message = 'Bad Request', $code = 'bad_request', $data = [], $httpCode = 400)
    {
        $response = [
            'code' => $code,
            'msg' => $message,
            'data' => $data,
        ];

        throw new ErrorResponse($response, $httpCode);
    }

    public function apiWarning($message = 'Warning', $code = 'warning', $data = [], $httpCode = 200)
    {
        $response = [
            'code' => $code,
            'msg' => $message,
            'data' => $data,
        ];

        throw new ErrorResponse($response, $httpCode);
    }
}
