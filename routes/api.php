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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// 基本控制器路由
Route::get('/test',[
    'as' => 'api.test.index',
    'uses' => 'Tests\TestController@index'
])->middleware('test');

// 隐式控制器路由,对应的方法名格式（驼峰法）：请求方式+方法名，方法名为多个单词时，路由以“-”连接
// Route::controler('home','HomeController');

// REST资源控制器路由
Route::resource(
    'tests','Tests\TestController'
)->middleware('test');
