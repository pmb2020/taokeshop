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

Route::get('banners',['App\Http\Controllers\Api\BannerController','index']);
Route::get('categories',['App\Http\Controllers\Api\CategoryController','index']);
Route::get('goods',['App\Http\Controllers\Api\GoodsController','index']);
Route::get('goods/show',['App\Http\Controllers\Api\GoodsController','show']);
Route::get('search',['App\Http\Controllers\Api\SearchController','index']);
Route::get('hotSearch',['App\Http\Controllers\Api\SearchController','hotSearch']);
Route::get('search/suggestion',['App\Http\Controllers\Api\SearchController','suggestion']);
Route::get('comment',['App\Http\Controllers\Api\CommentController','index']);
Route::get('order/taobao',['App\Http\Controllers\APi\OrderController','taobao']);
//每日爆品推荐
Route::get('dayBlast',['App\Http\Controllers\Api\SpecialController','dayBlast']);
Route::get('baoyou99',['App\Http\Controllers\Api\SpecialController','baoyou99']);
Route::get('transformLink',['App\Http\Controllers\Api\GoodsController','transformLink']);
Route::get('friendCircle',['App\Http\Controllers\Api\MaterialController','friendCircle']);
