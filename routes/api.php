<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

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

Route::post('countup',[LikeController::class,'countup']);
Route::post('getcount',[LikeController::class,'getcount']);

Route::post('getcomment',[CommentController::class,'getcomment']);
Route::post('getcommentcount',[CommentController::class, 'getcommentcount']);
Route::post('addcomment',[CommentController::class,'addcomment']);