<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    Route::post('auth/login','ApiAuthController@login');
    Route::post('auth/register','ApiAuthController@register');
    Route::post('auth/info','ApiAuthController@info')->middleware('auth:api');
});

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    Route::group(['prefix' => 'category'], function (){
        Route::get('','ApiCategoryController@index');
        Route::get('show/{id}','ApiCategoryController@show');
    });
    Route::group(['prefix' => 'product'], function (){
        Route::get('','ApiProductController@index');
        Route::get('show/{id}','ApiProductController@show');
    });

    Route::group(['prefix' => 'order'], function (){
        Route::get('','ApiOrderController@index');
        Route::get('show/{id}','ApiOrderController@show');
        Route::post('add','ApiOrderController@add');
    });
});
