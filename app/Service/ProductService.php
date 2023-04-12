<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/11/23 .
 * Time: 8:21 PM .
 */

namespace App\Service;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductService
{
    public static function index(Request $request)
    {
        return  CategoryResource::collection(Category::all());
    }
}
