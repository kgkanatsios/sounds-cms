<?php

namespace App\Exceptions;

use Exception;

class ApiValidationErrorException extends Exception
{
    public function render($request)
    {
        $messages = json_decode($this->getMessage(), true);
        $meta = null;
        foreach ($messages as $message) {
            foreach ($message as $value) {
                $meta .= $value;
            }
        }
        return response()->json([
            'errors' => [
                'code' => $this->getCode(),
                'title' => 'Validation Error',
                'detail' => 'Your request is malformed or missing fields.',
                'meta' => $meta,
            ]
        ], $this->getCode())->header('Content-Type', 'application/json');
    }
}
