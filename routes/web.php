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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes for "Muti Auth"

//Route for showing the admin's dashboard after login
Route::get('admin/home','AdminController@index');

//Route for showing the editor's dashboard after login
Route::get('admin/trainee','TraineeController@index');

Route::get('admin/test','TraineeController@test');

Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');

Route::POST('admin','Admin\LoginController@login')->name('admin.login');
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
