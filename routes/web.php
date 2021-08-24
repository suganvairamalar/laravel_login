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
    return view('frontend.index');
});

Auth::routes();

//'isAdmin' is mentioned in Kernal.php
Route::group(['middleware'=>['auth','isAdmin']],function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/registered-user','Admin\RegisteredUserController@index');
    Route::get('role-edit/{id}','Admin\RegisteredUserController@edit');
    Route::put('role-update/{id}','Admin\RegisteredUserController@updaterole');
    Route::get('/admin-profile', 'Admin\RegisteredUserController@adminrprofile');
Route::post('/admin-profile-update', 'Admin\RegisteredUserController@adminprofileupdate');

});





//'isUser' is mentioned in Kernal.php
Route::group(['middleware'=>['auth','isUser']],function(){

Route::get('/user-home', 'Frontend\UserController@index')->name('user-home');
Route::get('/user-profile', 'Frontend\UserController@userprofile');
Route::post('/user-profile-update', 'Frontend\UserController@userprofileupdate');

});
