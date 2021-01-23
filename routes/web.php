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

Route::get('/document', 'App\Http\Controllers\DocumentController@index')->name('document');

Route::get('/reporthis', 'App\Http\Controllers\ReporthisController@index')->name('reporthis');

Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@index')->name('register');

Route::post('/wplatasubmit','App\Http\Controllers\WplataController@save');

Route::post('/wyplatasubmit','App\Http\Controllers\WyplataController@save');

Route::post('/wyplatasubmit','App\Http\Controllers\WyplataController@save');


Route::get('edit/{id}','App\Http\Controllers\WplataController@showData');
Route::post('edit','App\Http\Controllers\WplataController@Update');
Route::get('delete/{id}','App\Http\Controllers\WplataController@Delete');



Route::get('edit2/{id}','App\Http\Controllers\WyplataController@showData');
Route::post('edit2','App\Http\Controllers\WyplataController@Update');
Route::get('delete2/{id}','App\Http\Controllers\WyplataController@Delete');


Route::resource('datarange', 'DataRangeController');


Route::get('/report/pdf', 'App\Http\Controllers\ReportController@createPDF');


Route::post('/reporthis', 'App\Http\Controllers\ReporthisController@search')->name('reporthis');




