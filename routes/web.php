<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Auth::routes();

Route::group(['prefix'=>'admin', 'middleware'=>array('auth')], function(){
    Route::resource('users',App\Http\Controllers\UsersController::class);
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\UsersController::class, 'profile'])->name('profile');
    Route::put('/change_profile',[App\Http\Controllers\UsersController::class, 'change_profile'])->name('change_profile');
    Route::put('/change_password',[App\Http\Controllers\UsersController::class, 'change_password'])->name('change_password');
    Route::resource('values',App\Http\Controllers\ValuesController::class);
    Route::resource('sliders',App\Http\Controllers\SlidersController::class);
    Route::resource('experts',App\Http\Controllers\ExpertsController::class);
    Route::resource('services',App\Http\Controllers\ServicesController::class);
    Route::resource('customers',App\Http\Controllers\CustomersController::class);
    Route::resource('process',App\Http\Controllers\ProcessController::class);
});


