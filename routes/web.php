<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Route::get('/', 'PagesController@index');
Route::get('/',function(){
    return view('welcome');
})->name('home');

// Authentication Routes
Route::prefix('admin')->namespace('Admin\Auth')->group(function(){
    Route::get('login','LoginController@showLoginForm')->name('admin.login');
    Route::post('login','LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');
    Route::get('create','RegisterController@showRegistrationForm')->name('admin.create');
    Route::post('create','RegisterController@register');
    Route::get('password/reset','AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/email','AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset/{token}','AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('password/reset','AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('verify-device','VerifyDeviceController@verifyDevice')->name('admin.device-verification');

});
// Admin Panel Routes
Route::prefix('admin')->namespace('Admin')->middleware(['auth-admin:admin'])->group(function(){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('profile', 'ProfileController@edit')->name('admin.profile.update');
    Route::post('profile', 'ProfileController@update');
    Route::get('list', 'AdminController@index');

});
// Demo routes (Template side)
 Route::get('/datatables', 'PagesController@datatables');
 Route::get('/ktdatatables', 'PagesController@ktDatatables');
 Route::get('/select2', 'PagesController@select2');
 Route::get('/icons/custom-icons', 'PagesController@customIcons');
 Route::get('/icons/flaticon', 'PagesController@flaticon');
 Route::get('/icons/fontawesome', 'PagesController@fontawesome');
 Route::get('/icons/lineawesome', 'PagesController@lineawesome');
 Route::get('/icons/socicons', 'PagesController@socicons');
 Route::get('/icons/svg', 'PagesController@svg');

// // Quick search dummy route to display html elements in search dropdown (header search)
 Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

// Front-end Routes
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
