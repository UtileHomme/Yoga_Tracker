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


Route::resource('workout','TraineeController');


Auth::routes();

Route::get('/home/{name}', ['uses' => 'HomeController@index','as' => 'home']);

//Routes for "Muti Auth"

//Route for showing the admin's dashboard after login
Route::get('admin/home','AdminController@index');

Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');

Route::POST('admin','Admin\LoginController@login')->name('admin.login');

Route::get('logout', '\App\Http\Controllers\Admin\LoginController@logout');
Route::POST('logout', 'Admin\LoginController@logout')->name('logout');


Route::get('profile','TraineeController@profile')->name('profile');
Route::get('editprofile','TraineeController@editprofile')->name('editprofile');
Route::post('updateprofile','TraineeController@updateprofile')->name('updateprofile');

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
