<?php

namespace App\Exceptions;

use Exception;

class ApiErrorException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'errors' => [
                'code' => $this->getCode(),
                'title' => 'Error',
                'detail' => 'Error has occurred',
                'meta' => $this->getMessage(),
            ]
        ], $this->getCode())->header('Content-Type', 'application/json');
    }
}
