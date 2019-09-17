<?php

use Illuminate\Http\Request;

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
//Route::resource('/articles', 'ArticleController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/tasks','TaskController',[
    'except' =>['edit','show']
]);


Route::apiresource('/products', 'ProductController');


Route::group(['prefix' => 'products'], function() {
    Route::apiresource('{products}/reviews', 'ReviewController');
    Route::resource('{products}/images', 'ImageProductController');
});
