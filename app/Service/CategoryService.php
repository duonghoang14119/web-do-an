<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/10/23 .
 * Time: 2:46 AM .
 */

namespace App\Service;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{
    public static function index(Request $request)
    {
        return  CategoryResource::collection(Category::all());
    }
}
