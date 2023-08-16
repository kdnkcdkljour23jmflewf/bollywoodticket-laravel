<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{DashboardController,UserController,CategoryController};
use App\Http\Controllers\Admin\Movie\MovieController;
use App\Http\Controllers\Employee\{EmployeeController};
use App\Http\Controllers\Admin\Seat\SeatController;
use App\Http\Controllers\Hr\{HrController};
use App\Http\Controllers\Admin\Ticket\TicketController;
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

// Route::any('login', [UserController::class,'user_login']);

Route::middleware('adminauthcheck')->prefix('admin')->controller(UserController::class)->group(function(){
    Route::any('login','user_login');
});

Route::middleware('adminrequestcheck')->prefix('admin')->controller(UserController::class)->group(function(){
    Route::any('logout','user_logout');
});

Route::middleware('adminrequestcheck')->prefix('admin')->controller(DashboardController::class)->group(function(){
    Route::any('dashboard','dashboard_view');
});
Route::middleware('adminrequestcheck')->prefix('admin')->controller(CategoryController::class)->group(function(){
    Route::any('category-add','category_add');
    Route::any('category-edit/{id}','category_add')->name('category-edit');
    Route::any('category-list','category_list')->name('category-list');
    Route::post('category-delete','category_delete')->name('category-delete');
});

Route::middleware('adminrequestcheck')->prefix('admin')->controller(MovieController::class)->group(function(){
    Route::get('movie-list','movie_list')->name('movie-list');
    Route::any('movie-insert','movie_add')->name('movie-insert');
    Route::any('movie-edit/{id}','movie_add')->name('movie-edit');
    Route::post('movie-delete','movie_delete')->name('movie-delete');
});

Route::middleware('adminrequestcheck')->prefix('admin')->controller(SeatController::class)->group(function(){
    Route::get('seat-list','seat_list')->name('seat-list');
    Route::any('seat-insert','seat_add')->name('seat-insert');
    Route::any('seat-edit/{id}','seat_add')->name('seat-edit');
    Route::post('seat-delete','seat_delete')->name('seat-delete');
});
Route::middleware('adminrequestcheck')->prefix('admin')->controller(TicketController::class)->group(function(){
    Route::get('ticketprice-list','ticket_list')->name('ticketprice-list');
    Route::any('ticketprice-insert','ticket_add')->name('ticketprice-insert');
    Route::any('ticketprice-edit/{id}','ticket_add')->name('ticketprice-edit');
    Route::post('ticketprice-delete','ticket_delete')->name('ticketprice-delete');
    Route::post('get_movie','get_movie')->name('get_movie');
});

// Route::get('admin/dashboard',[DashboardController::class,'dashboard_view']);


Route::any('emp_form',[EmployeeController::class,'emp_form']);
Route::any('emp_form_edit/{id?}',[EmployeeController::class,'emp_form_edit']);
Route::any('emp_resume_list',[EmployeeController::class,'emp_resume_list']);
Route::any('emp_resume_delete',[EmployeeController::class,'emp_resume_delete']);
Route::any('emp_resume_list_hr',[HrController::class,'emp_resume_list']);
// Route::get('admin/dashboard',[DashboardController::class,'dashboard_view']);


