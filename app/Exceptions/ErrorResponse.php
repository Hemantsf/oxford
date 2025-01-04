<?php

namespace App\Exceptions;

use Exception;

class ErrorResponse extends Exception
{
    protected $responseData;

    public function __construct(array $responseData, $httpCode = 500)
    {
        $this->responseData = $responseData;
        parent::__construct($responseData['msg'] ?? 'An error occurred', $httpCode);
    }

    public function render()
    {
        return response()->json(array_merge([
            'status' => 'error',
        ], $this->responseData), $this->getCode());
    }
}
