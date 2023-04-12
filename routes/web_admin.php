<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/10/23 .
 * Time: 5:13 PM .
 */

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function (){
    Route::group(['prefix' => 'category'], function (){
        Route::get('','AdminCategoryController@index')->name('get_admin.category.index');
        Route::get('create','AdminCategoryController@create')->name('get_admin.category.create');
        Route::post('create','AdminCategoryController@store');

        Route::get('update/{id}','AdminCategoryController@edit')->name('get_admin.category.update');
        Route::post('update/{id}','AdminCategoryController@update');
    });
    Route::group(['prefix' => 'product'], function (){
        Route::get('','AdminProductController@index')->name('get_admin.product.index');
        Route::get('create','AdminProductController@create')->name('get_admin.product.create');
        Route::post('create','AdminProductController@store');

        Route::get('update/{id}','AdminProductController@edit')->name('get_admin.product.update');
        Route::post('update/{id}','AdminProductController@update');
    });
});
