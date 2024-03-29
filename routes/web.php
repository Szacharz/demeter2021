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
Route::group(['middleware' => ['auth']], function() {

    /* Dostęp do podstron */
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/payin', 'App\Http\Controllers\PayinController@index')->name('payin');
Route::get('/payout', 'App\Http\Controllers\PayoutController@index')->name('payout');
Route::get('/report', 'App\Http\Controllers\ReportController@index')->name('report');
Route::get('/manage', 'App\Http\Controllers\ManageController@index')->name('manage');
Route::get('/superadmin', 'App\Http\Controllers\SuperAdminController@index')->name('superadmin');
Route::get('/newuserSU', 'App\Http\Controllers\NewUserSUController@index')->name('newuserSU');
Route::get('/newprivate', 'App\Http\Controllers\NewPrivateController@index')->name('newprivate');
Route::get('/newgroupentry', 'App\Http\Controllers\NewGroupEntryController@index')->name('newgroupentry');
Route::get('/listdepartments', 'App\Http\Controllers\ListDepartmentsController@index')->name('listdepartments');
Route::get('/departmentstats', 'App\Http\Controllers\DepartmentStatsController@index')->name('departmentstats');
Route::get('/borrowedequipment', 'App\Http\Controllers\DevicesController@index')->name('borrowedequipment');
Route::get('/newdevice', 'App\Http\Controllers\NewDeviceController@index')->name('newdevice');
Route::get('/archivedevice', 'App\Http\Controllers\ArchiveDeviceController@index')->name('archivedevice');

/*Tworzenie użytkowników */
Route::get('/profile', 'App\Http\Controllers\ProfileController@index');
Route::get('/newuser', 'App\Http\Controllers\NewUserController@index');
Route::get('/register', 'App\Http\Controllers\NewUserController@create');
Route::post('register', 'App\Http\Controllers\NewUserController@store');

/*SuperUser tworzenie użytkowników */
Route::get('/register', 'App\Http\Controllers\NewUserSUController@create');
Route::post('register', 'App\Http\Controllers\NewUserSUController@store2');

/*Tworzenie grup*/
Route::get('/group', 'App\Http\Controllers\GroupController@index');
Route::get('/dictionary', 'App\Http\Controllers\DictionaryController@index');
Route::get('/newgroup', 'App\Http\Controllers\NewGroupController@index');
Route::post('/groupsubmit', 'App\Http\Controllers\NewGroupController@save');
Route::get('/editgroup/{id}', 'App\Http\Controllers\EditGroupController@ShowData')->name('editgroup');
Route::post('editgroup','App\Http\Controllers\EditGroupController@editgroup');
Route::post('addmore','App\Http\Controllers\NewGroupController@addMore');
/* Route::get('/editgroup/{id}', 'App\Http\Controllers\EditGroupController@index'); */

/*Tworzenie działów */
Route::get('/newdepartment', 'App\Http\Controllers\NewDepartmentController@index');
Route::post('/departmentsubmit', 'App\Http\Controllers\NewDepartmentController@save');


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
Route::post('/devicesubmit','App\Http\Controllers\NewDeviceController@save');
Route::post('/privatesubmit','App\Http\Controllers\NewPrivateController@save');
Route::post('/newgroupsubmit','App\Http\Controllers\NewGroupEntryController@save');
Route::post('newcustomsearch','App\Http\Controllers\ReportController@applysearch');


/* routy edycji*/
Route::get('edit/{id_usterki}','App\Http\Controllers\UsterkiController@showData');
Route::post('edit','App\Http\Controllers\UsterkiController@edit');
Route::get('edit3/{id}','App\Http\Controllers\ManageController@showData');
Route::post('edit3','App\Http\Controllers\ManageController@edit3');
Route::get('getUsers',[EditGroupController::class, 'getUsers'])->name('getUsers');

/*edycja notatek */
Route::get('editnote/{id_usterki}/{id_notatki}','App\Http\Controllers\NotatkiController@ShowData');
Route::post('editnote','App\Http\Controllers\NotatkiController@editnote');

/*usuwanie */
Route::get('delete/{id_usterki}','App\Http\Controllers\UsterkiController@Delete');

/*zakończenie danego wpisu */
Route::get('Change/{id_usterki}','App\Http\Controllers\UsterkiController@Change'); /*Ogólne*/
Route::get('ChangePrivate/{id_usterki}','App\Http\Controllers\PayoutController@ChangePrivate'); /*Prywatne*/
Route::get('ChangeExpiration/{id_usterki}','App\Http\Controllers\ExpirationController@ChangeExpiration'); /*Przedawnione*/
Route::get('ChangeGroup/{id_usterki}','App\Http\Controllers\GroupController@ChangeGroup');

/*cofnięcie zakończonego wpisu */
Route::get('Back/{id_usterki}','App\Http\Controllers\UsterkiController@Back');

Route::get('goback/{id}','App\Http\Controllers\DevicesController@goback');
/*Others*/
Route::get('edit2/{id_usterki}','App\Http\Controllers\UsterkiController@showData');
Route::post('edit2','App\Http\Controllers\UsterkiController@Update');
Route::get('delete2/{id_usterki}','App\Http\Controllers\UsterkiController@Delete');
Route::resource('datarange', 'DataRangeController');
Route::get('/report/pdf', 'App\Http\Controllers\ReportController@createPDF');
Route::post('/reporthis', 'App\Http\Controllers\ReporthisController@search')->name('reporthis');
Route::get('/calendar', 'App\Http\Controllers\CalendarController@index')->name('calendar');
Route::get('note/{id_usterki}','App\Http\Controllers\NotatkiController@appearData');

Route::get('device/{id_usterki}','App\Http\Controllers\DevicesController@appearData');

Route::post('note/{id_usterki}/{id_notatki}', ['uses' => 'NotatkiController@showphoto']);

Route::post('/notesubmit','App\Http\Controllers\NotatkiController@save');

Route::get('/markAsRead','App\Http\Controllers\UsterkiController@markAsRead');


Route::get('release/{id}','App\Http\Controllers\NewDeviceController@release');
/*Others*/




// Route::get('changepassword', function() {
//     $user = App\User::where('email', 'm.jakubiec@euro-comfort.pl')->first();
//     $user->password = Hash::make('start123');
//     $user->save();
 
//     echo 'Password changed successfully.';
// });

/**errory */
});
?>

