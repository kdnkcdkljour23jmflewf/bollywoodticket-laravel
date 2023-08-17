<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Web\{HomeController,UserController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/',[GoogleController::class,'login']);

// Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// Route::get('dashboard', [GoogleController::class, 'dashboard']);



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// webloginauthcheck will check and redirect to login ---
// weblogincheck will check and redirect to particular page user want

Route::get('/',[HomeController::class,'home']);

// Route::prefix('web')->controller(UserController::class)->group(function(){
Route::middleware('webloginauthcheck')->controller(UserController::class)->group(function(){
    Route::any('user-login','user_login')->name('user-login');
    Route::any('user-register','user_register')->name('user-register');
    // Route::any('user-dashboard','user_dashboard')->name('user-dashboard');
});
Route::middleware('weblogincheck')->controller(UserController::class)->group(function(){
    Route::any('user-dashboard','user_dashboard')->name('user-dashboard');
});