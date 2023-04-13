<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $credentials = [
                "email"    => $request->email,
                "password" => $request->password
            ];

            if (Auth::attempt($credentials)) {
//            if (\Auth::guard('api')->attempt($credentials)) {
                $user = Auth::user();
//                Carbon::parse(
//                    $tokenResult->token->expires_at
//                )->toDateTimeString()
                $response = $user->createToken('token');
                $data        = [
                    'token_info' => $response
                ];
                return response()->json(ResponseService::getSuccess($data));
            }

            return response()->json(ResponseService::getErrorCode("Đăng nhập thất bại", "ERROR01"));
        } catch (\Exception $exception) {
            Log::error("ApiAuthController@login => File:  \n" .
                $exception->getFile() . " Line: \n" .
                $exception->getLine() . " Message: \n" .
                $exception->getMessage());

            return response()->json(ResponseService::getErrorCode($exception->getMessage(), "ERROR01"), 500);
        }
    }

    public function register(Request $request)
    {
        try {

        } catch (\Exception $exception) {
            Log::error("ApiAuthController@register => File:  " .
                $exception->getFile() . " Line: " .
                $exception->getLine() . " Message: " .
                $exception->getMessage());
            return response()->json([
                'data' => []
            ], 501);
        }
    }

    public function info(Request $request)
    {
        try {
            $user = Auth::user();
            return response()->json(['success' => $user]);
        } catch (\Exception $exception) {
            Log::error("ApiAuthController@info => File:  " .
                $exception->getFile() . " Line: " .
                $exception->getLine() . " Message: " .
                $exception->getMessage());
            return response()->json([
                'data' => []
            ], 501);
        }
    }
}
