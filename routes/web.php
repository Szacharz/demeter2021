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
    return view('/Auth/login');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/payin', 'App\Http\Controllers\PayinController@index')->name('payin');

Route::get('/payout', 'App\Http\Controllers\PayoutController@index')->name('payout');

Route::get('/report', 'App\Http\Controllers\ReportController@index')->name('report');

Route::get('/reporthis', 'App\Http\Controllers\ReporthisController@index')->name('reporthis');

Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@index')->name('register');

Route::post('/wplatasubmit','App\Http\Controllers\WplataController@save');

Route::post('/wyplatasubmit','App\Http\Controllers\WyplataController@save');

Route::post('/wyplatasubmit','App\Http\Controllers\WyplataController@save');

Route::get('edit/{numer_dowodu_wplaty}',[App\Http\Controllers\WplataController::class,'showData']);







