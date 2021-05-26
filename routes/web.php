<?php

use App\Events\NewExpenseNotification;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    return view('auth.login');
});


//Route::resource('expenses', 'DashboardController@index');

//TODO: Implementar sesión del usuario
Route::get('dashboard', 'DashboardController@index')
    -> name('dashboard.index');

Route::resource('categories', 'CategoryController');

Route::resource('expenses', 'ExpensesController'); // No existe archivo

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

Route::resource('user', 'UsersController');
Route::resource('account', 'AccountController');

Route::get('/send/{expense}', function($expense){
    event(new NewExpenseNotification($expense));
});


/* Oauth */
Route::get('/sign-in/github', 'AuthController@github');
Route::get('/sign-in/github/redirect', 'AuthController@githubRedirect');

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    // All providers...
    $user->getId();
    $user->getNickname();
    $user->getName();
    $user->getEmail();
    $user->getAvatar();
    // $user->token
});