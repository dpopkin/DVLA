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
    return view('auth/login');
})->middleware('guest');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->where(['id' => '[0-9]+']);
    Route::resource('bills', BillController::class)->only(['index', 'show'])->where(['bill' => '[0-9]+']);
    Route::resource('items', ItemsController::class)->only(['index', 'show', 'edit', 'update']);
    Route::get('/command', 'CommandController@home')->name('command');
    Route::post('/command/execute', 'CommandController@execute');
    Route::get('/admin', 'AdminController@index')->middleware('is.admin');
});
