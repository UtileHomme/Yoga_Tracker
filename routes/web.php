<?php

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
    return view('welcome');
})->name('welcome');

Route::get('/aboutme','AboutMeController@index');

Route::get('/download-resume','ResumeController@index')->name('download-resume');

Route::get('workout/display','TraineeController@display')->name('workout.display');
Route::get('workout/statistics','TraineeController@statistics')->name('workout.statistics');

Route::get('admin/display','AdminController@display')->name('admin.display');
Route::get('admin/{id}/edit','AdminController@edit')->name('admin.edit');



Route::resource('workout','TraineeController');
Route::resource('trainer','TrainerController');


Auth::routes();
//
// Route::POST('update', function () {
//     dd('asd');
// });


Route::POST('update','AdminController@update');
Route::POST('destroy','AdminController@destroy');

Route::get('/home/{name}', ['uses' => 'HomeController@index','as' => 'home']);

//Routes for "Muti Auth"

//Route for showing the admin's dashboard after login
Route::get('admin/home','AdminController@index')->name('admin.home');
Route::get('admin/create','AdminController@create')->name('admin.create');
Route::post('admin/store','AdminController@store')->name('admin.store');

Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');

Route::POST('admin','Admin\LoginController@login')->name('admin.login');

Route::get('logout', '\App\Http\Controllers\Admin\LoginController@logout');
Route::POST('logout', 'Admin\LoginController@logout')->name('logout');


Route::get('profile','TraineeController@profile')->name('profile');
Route::get('editprofile','TraineeController@editprofile')->name('editprofile');
Route::post('updateprofile','TraineeController@updateprofile')->name('updateprofile');

Route::get('adminprofile','AdminController@adminprofile')->name('adminprofile');
Route::get('editadminprofile','AdminController@editadminprofile')->name('editadminprofile');
Route::post('updateadminprofile','AdminController@updateadminprofile')->name('updateadminprofile');

Route::get('trainerprofile','TrainerController@trainerprofile')->name('trainerprofile');
Route::get('edittrainerprofile','TrainerController@edittrainerprofile')->name('edittrainerprofile');
Route::post('updatetrainerprofile','TrainerController@updatetrainerprofile')->name('updatetrainerprofile');

Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

Route::GET('trainee-register','TraineeRegisterController@showRegistrationForm')->name('trainee.register');
Route::POST('trainee-register','TraineeRegisterController@register')->name('trainee.registered');


Route::POST('contactform','ContactFormController@contact')->name('contact');

//Route for PDF generation of view
Route::get('pdfview','PDFController@index1');
Route::get('pdf','PDFController@index')->name('pdf');

// Routes for Login with google
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

// Routes for Adding Comments on the person activities
Route::get('addcomment','TraineeController@addcomment')->name('addcomment');
Route::get('addcommentall','TraineeController@addcommentall')->name('addcommentall');

Route::get('updatecommentcount','TraineeController@commentcount')->name('updatecommentcount');
Route::get('updatecommentcountall','TraineeController@commentcountall')->name('updatecommentcountall');

Route::get('updatelikes','TraineeController@updatelikes')->name('updatelikes');
Route::get('updatelikeshow','TraineeController@updatelikeshow')->name('updatelikeshow');
Route::get('reducelikeshow','TraineeController@reducelikeshow')->name('reducelikeshow');
Route::get('updatelikeshowall','TraineeController@updatelikeshowall')->name('updatelikeshowall');
Route::get('reducelikeshowall','TraineeController@reducelikeshowall')->name('reducelikeshowall');
Route::get('updatelikesall','TraineeController@updatelikesall')->name('updatelikesall');
Route::get('reducelikes','TraineeController@reducelikes')->name('reducelikes');
Route::get('reducelikesall','TraineeController@reducelikesall')->name('reducelikesall');

Route::get('traineechangepassword', 'UpdatePasswordController@traineeindex')->name('traineechangepassword');
Route::post('traineechangepassword', 'UpdatePasswordController@traineeupdate')->name('traineechangepassword');

Route::get('adminchangepassword', 'UpdatePasswordController@adminindex')->name('adminchangepassword');
Route::post('adminchangepassword', 'UpdatePasswordController@adminupdate')->name('adminchangepassword');

Route::get('trainerchangepassword', 'UpdatePasswordController@trainerindex')->name('trainerchangepassword');
Route::post('trainerchangepassword', 'UpdatePasswordController@trainerupdate')->name('trainerchangepassword');

Route::get('downloadcsv','TrainerController@downloadcsv')->name('downloadcsv');

Route::get('check','CheckController@index');
