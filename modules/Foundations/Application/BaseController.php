<?php

namespace Meraki\Foundations\Application;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
    public function simpleSuccessResponse(string $message = 'success')
    {
        $response = [
            'code'      => Response::HTTP_OK,
            'status'    => 'success',
            'message'   => $message,
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function simpleErrorResponse(string $message = 'error')
    {
        $response = [
            'code'      => Response::HTTP_BAD_REQUEST,
            'status'    => 'error',
            'message'   => $message,
        ];

        return response()->json($response, Response::HTTP_BAD_REQUEST);
    }
}
