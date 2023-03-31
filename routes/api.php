<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\postApiController;
use App\Http\Controllers\Api\categoryApiController;

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

//post
Route::get('allPosts',[postApiController::class,'allPosts']);
Route::post('post/search',[postApiController::class,'searchPost']);
Route::post('post/singlePost',[postApiController::class,'singlePost']);

//category
Route::get('allCategories',[categoryApiController::class,'allCategories']);
Route::post('category/search',[categoryApiController::class,'searchCategory']);

