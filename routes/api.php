<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\Modules\{CategoryController,ProductController};
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


//start API route for user singup and signin
Route::controller(UserController::class)->group(function(){
    Route::post('user-login','user_login');
    Route::post('user-register','user_register');
});

Route::middleware(['auth:sanctum','throttle:60,1'])->controller(CategoryController::class)->group(function(){
        Route::get('all-category','category_list')->name('all-category');
});
Route::middleware(['auth:sanctum'])->controller(ProductController::class)->group(function(){
        Route::get('all-movies','product_list')->name('all-movies');
});
