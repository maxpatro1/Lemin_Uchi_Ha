<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ApiController  extends Controller
{
    protected $statusCode;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function respondNotFound($message = 'Not Found!'): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status_code' => $this->getStatusCode()
        ]);
    }

    protected function respond($data, $headers = []): \Illuminate\Http\JsonResponse
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

}
