<?php

namespace App\Helpers;

class ResponseHelper
{

    public function success_response($success, $msg, $data)
    {
        return response()->json([
            'data'=> [
                'success' => $success,
                'msg' => $msg,
                'data' => $data
            ]
        ]);
    }

    public function error_response($success, $msg, $status)
    {
        return response()->json([
            'data'=> [
                'success' => $success,
                'msg' => $msg,
                'status'=> $status
            ]
        ]);
    }



}
