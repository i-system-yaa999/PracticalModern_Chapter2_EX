<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TweetController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware'=>['auth:api'],'prefix'=>'auth'],function($router){
    Route::post('register',[AuthController::class,'register'])->withoutMiddleware(['auth:api']);
    Route::post('login',[AuthController::class,'login'])->withoutMiddleware(['auth:api']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('refresh',[AuthController::class,'refresh']);
    Route::get('user',[AuthController::class,'me']);
});

Route::post('newtweet',[TweetController::class,'newtweet']);
Route::get('gettweet',[TweetController::class,'gettweet']);
Route::post('destroytweet',[TweetController::class,'destroytweet']);
Route::post('countup',[TweetController::class,'countup']);
Route::post('getcount',[TweetController::class,'getcount']);
Route::post('getcomment',[TweetController::class,'getcomment']);
Route::post('addcomment',[TweetController::class,'addcomment']);