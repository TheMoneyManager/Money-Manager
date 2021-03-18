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
    return view('auth.register');
});


//Route::resource('expenses', 'DashboardController@index');

//TODO: Implementar sesión del usuario
Route::get('dashboard', 'DashboardController@index') 
    -> name('dashboard.index');

/* AuthController */
Route::get('register', 'AuthController@register') 
    -> name('auth.register');
Route::post('register', 'AuthController@doRegister') 
    -> name('auth.do-register');
Route::get('login', 'AuthController@login') 
-> name('auth.login');
Route::post('login', 'AuthController@doLogin') 
    -> name('auth.do-login');
Route::any('logout', 'AuthController@logout') 
    -> name('auth.logout');