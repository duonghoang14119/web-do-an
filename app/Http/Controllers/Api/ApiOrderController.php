<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequestApi;
use App\Service\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiOrderController extends Controller
{
    public function index(Request $request)
    {
        try {
            $order = OrderService::index($request);

            return response()->json([
                'data' => $order
            ], 200);

        } catch (\Exception $exception) {
            Log::error("ApiOrderController@add => File:  " .
                $exception->getFile() . " Line: " .
                $exception->getLine() . " Message: " .
                $exception->getMessage());
            return response()->json([
                'data' => []
            ], 501);
        }
    }

    public function add(OrderCreateRequestApi $request)
    {
        try {
            $response = OrderService::add($request);

            if ($response['status'] === 'fail') {
                return response()->json([
                    'status' => 'fail',
                    'data'   => $response['data']
                ], 501);
            }
            return response()->json([
                'status' => 'success',
                'data'   => $response['data']
            ], 200);

        } catch (\Exception $exception) {
            Log::error("ApiOrderController@add => File:  " .
                $exception->getFile() . " Line: " .
                $exception->getLine() . " Message: " .
                $exception->getMessage());
            return response()->json([
                'data' => []
            ], 501);
        }
    }
}
