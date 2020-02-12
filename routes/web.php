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
    return view('home');
});

Route::get('/SignUp', "SignUpController@showSignUpForm")->name('SignUp');
Route::post('/SignUp', "SignUpController@store")->name('SignUp');
Route::get('/SignIn', "SignInController@showSignInForm")->name('SignIn');
Route::post('/SignIn', "SignInController@store")->name('SignIn');

Route::get('/Dashboard', "DashoardController@index")->name('Dashboard');
Route::get('/Profile', "DashoardController@getUser")->name('Profile');
Route::get('/user/{id}/edit', "DashoardController@edit")->name('user.edit');
Route::get('/user/{id}/delete', "DashoardController@destroy")->name('user.delete');
Route::post('/Update', "DashoardController@update")->name('Update');
Route::post('/SignOut', "DashoardController@doSignOut")->name('SignOut');
