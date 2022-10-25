<?php

namespace Meraki\Foundations\Application;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    public function simpleSuccessResponse($message)
    {
        $response = [
            'status_code' => Response::HTTP_OK,
            'status_text' => 'success',
            'message' => $message,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function simpleErrorResponse($message)
    {
        $response = [
            'status_code' => Response::HTTP_BAD_REQUEST,
            'status_text' => 'error',
            'message' => $message,
        ];

        return response()->json($response, Response::HTTP_BAD_REQUEST);
    }
}
