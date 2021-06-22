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

Auth::routes();	 	
/*usunac wszystko po routes ['register' => false] */

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/payin', 'App\Http\Controllers\PayinController@index')->name('payin');

Route::get('/payout', 'App\Http\Controllers\PayoutController@index')->name('payout');

Route::get('/report', 'App\Http\Controllers\ReportController@index')->name('report');

Route::get('/manage', 'App\Http\Controllers\ManageController@index')->name('manage');

Route::get('/newprivate', 'App\Http\Controllers\NewPrivateController@index')->name('newprivate');

/*Tworzenie użytkowników */
Route::get('/profile', 'App\Http\Controllers\ProfileController@index');
Route::get('/newuser', 'App\Http\Controllers\NewUserController@index');
Route::get('/register', 'App\Http\Controllers\NewUserController@create');
Route::post('register', 'App\Http\Controllers\NewUserController@store');

/*Tworzenie grup*/
Route::get('/group', 'App\Http\Controllers\GroupController@index');
Route::get('/dictionary', 'App\Http\Controllers\DictionaryController@index');
Route::get('/newgroup', 'App\Http\Controllers\NewGroupController@index');
Route::post('/groupsubmit', 'App\Http\Controllers\NewGroupController@save');
Route::get('/editgroup/{id}', 'App\Http\Controllers\EditGroupController@ShowData');
Route::post('editgroup','App\Http\Controllers\EditGroupController@editgroup');
/* Route::get('/editgroup/{id}', 'App\Http\Controllers\EditGroupController@index'); */


/*Zmiana Hasła i name*/
Route::post('/changepassd', 'App\Http\Controllers\ProfileController@store');
Route::post('/changenick', 'App\Http\Controllers\ProfileController@nick');

Route::get('/expiration', 'App\Http\Controllers\ExpirationController@index')->name('expiration');

Route::get('report/list', [ReportController::class, 'search'])->name('report.list');

Route::get('/document', 'App\Http\Controllers\DocumentController@index')->name('document');

Route::get('/reporthis', 'App\Http\Controllers\ReporthisController@index')->name('reporthis');
Route::get('/reporthis/list', [ReporthisController::class, 'getUsterki'])->name('reporthis.list');

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');  /*zmienic get na post*/

Route::post('/usterkisubmit','App\Http\Controllers\UsterkiController@save');

Route::post('/privatesubmit','App\Http\Controllers\NewPrivateController@save');

/* routy edycji*/
Route::get('edit/{id_usterki}','App\Http\Controllers\UsterkiController@showData');
Route::post('edit','App\Http\Controllers\UsterkiController@edit');

Route::get('edit3/{id}','App\Http\Controllers\ManageController@showData');
Route::post('edit3','App\Http\Controllers\ManageController@edit3');

/*edycja notatek */
Route::get('editnote/{id_notatki}','App\Http\Controllers\NotatkiController@showData');
Route::post('editnote','App\Http\Controllers\NotatkiController@editnote');

/*usuwanie */
Route::get('delete/{id_usterki}','App\Http\Controllers\UsterkiController@Delete');

/*zakończenie danego wpisu */
Route::get('Change/{id_usterki}','App\Http\Controllers\UsterkiController@Change');


Route::get('edit2/{id_usterki}','App\Http\Controllers\UsterkiController@showData');
Route::post('edit2','App\Http\Controllers\UsterkiController@Update');
Route::get('delete2/{id_usterki}','App\Http\Controllers\UsterkiController@Delete');



Route::resource('datarange', 'DataRangeController');


Route::get('/report/pdf', 'App\Http\Controllers\ReportController@createPDF');


Route::post('/reporthis', 'App\Http\Controllers\ReporthisController@search')->name('reporthis');
Route::get('/calendar', 'App\Http\Controllers\CalendarController@index')->name('calendar');


Route::get('note/{id_usterki}','App\Http\Controllers\NotatkiController@appearData');
Route::post('/notesubmit','App\Http\Controllers\NotatkiController@save');

/**errory */


?>

