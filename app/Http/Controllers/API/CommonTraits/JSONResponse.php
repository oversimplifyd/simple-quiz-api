<?php

namespace QUIZ\Http\CommonTraits;

use QUIZ\Exceptions\AppError;

trait JSONResponse
{
    public function success($data, $code = 200, $meta = [])
    {
        return response()->json([
            "status" => true,
            "data" => $data,
            "meta" => $meta
        ], $code);
    }

    public function error(AppError $error, $message, $code = 404)
    {
        return response()->json([
            "status" => false,
            "errors" =>  $error->getErrorDetails($message)
        ], $code);
    }
}
