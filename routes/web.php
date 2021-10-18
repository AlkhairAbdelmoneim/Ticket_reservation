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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);
// Auth::routes();




Route::group(['middleware' => 'auth'] , function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('passenger', App\Http\Controllers\PassengerController::class)->except(['show']);
    Route::resource('travels', App\Http\Controllers\TravelsController::class)->except(['show']);
    Route::resource('bus', App\Http\Controllers\BusController::class)->except(['show']);
    Route::resource('travelsHagz', App\Http\Controllers\TravelsHagzController::class)->except(['show']);
    Route::get('dropTickets/{passeng}/{travel}', [App\Http\Controllers\DropTicketsController::class , 'index'])->name('dropTickets');
    
});