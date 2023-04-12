<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiCategoryController extends Controller
{
    public function index(Request $request)
    {
        try{

            $categories = CategoryService::index($request);

            return response()->json([
                'data' => $categories
            ], 200);

        }catch (\Exception $exception) {
            Log::error("ApiCategoryController@index => File:  ".
                $exception->getFile(). " Line: ".
                $exception->getLine() ." Message: ".
                $exception->getMessage());
            return response()->json([
                'data' => []
            ], 501);
        }
    }
}
