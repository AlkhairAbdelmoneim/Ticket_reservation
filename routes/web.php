<?php

use Illuminate\Support\Facades\Route;

define('PAGINATION_COUNT' , 2);

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

// رابط الدخول الي شاشة تسجيل الدخول
Route::get('/', function () {
    return view('auth.login');
});

// رابط الدخول الي شاشة تسجيل مستخدم جديد
Auth::routes(['register' => false]);
// Auth::routes();

Route::group(['middleware' => 'auth'] , function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('petition', App\Http\Controllers\PetitionController::class)->except(['show']);
    Route::resource('department', App\Http\Controllers\DepartmentController::class)->except(['show']);
    Route::resource('employee', App\Http\Controllers\EmployeeController::class)->except(['show']);
    Route::get('printThis/{id}', [App\Http\Controllers\PrintThisController::class ,'printThis'])->name('printThis');
    Route::post('change', [App\Http\Controllers\ChangeUserController::class ,'change'])->name('change');
});