<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiProductController extends Controller
{
    public function index(Request $request)
    {
        try{

            $products = ProductService::index($request);

            return response()->json([
                'data' => $products
            ], 200);

        }catch (\Exception $exception) {
            Log::error("ApiProductController@index => File:  ".
                $exception->getFile(). " Line: ".
                $exception->getLine() ." Message: ".
                $exception->getMessage());
            return response()->json([
                'data' => []
            ], 501);
        }
    }
}
