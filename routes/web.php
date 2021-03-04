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
});

Auth::routes(['register' => false]);	 	
/*usunac wszystko po routes*/ 

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/payin', 'App\Http\Controllers\PayinController@index')->name('payin');

Route::get('/payout', 'App\Http\Controllers\PayoutController@index')->name('payout');

Route::get('/report', 'App\Http\Controllers\ReportController@index')->name('report');


Route::get('/search', 'App\Http\Controllers\ReportController@search');

Route::get('/document', 'App\Http\Controllers\DocumentController@index')->name('document');

Route::get('/reporthis', 'App\Http\Controllers\ReporthisController@index')->name('reporthis');


Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');  /*zmienic get na post*/

Route::post('/wplatasubmit','App\Http\Controllers\WplataController@save');

Route::post('/wyplatasubmit','App\Http\Controllers\WyplataController@save');

Route::post('/wyplatasubmit','App\Http\Controllers\WyplataController@save');

Route::post('/usterkisubmit','App\Http\Controllers\UsterkiController@save');

/* routy edycji*/
Route::get('edit/{id_usterki}','App\Http\Controllers\UsterkiController@showData');
Route::post('edit','App\Http\Controllers\UsterkiController@Update');
Route::get('delete/{id_usterki}','App\Http\Controllers\UsterkiController@Delete');


Route::get('edit2/{id_usterki}','App\Http\Controllers\UsterkiController@showData');
Route::post('edit2','App\Http\Controllers\UsterkiController@Update');
Route::get('delete2/{id_usterki}','App\Http\Controllers\UsterkiController@Delete');



Route::resource('datarange', 'DataRangeController');


Route::get('/report/pdf', 'App\Http\Controllers\ReportController@createPDF');


Route::post('/reporthis', 'App\Http\Controllers\ReporthisController@search')->name('reporthis');


?>

