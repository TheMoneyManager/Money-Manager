<?php

use App\Events\NewExpenseNotification;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionsController;
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

//SuperAdmin Dashboard
Route::get('dashboard_sa', 'Dashboard_saController@index')
-> name('dashboard_sa.index');

Route::resource('categories', 'CategoryController');

Route::resource('expenses', 'ExpensesController');
Route::resource('incomes', 'IncomesController');

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
Route::resource('user-account', 'RelAccountUserController');
Route::resource('transaction', 'TransactionsController');

Route::get('/conversion', [AccountController::class, 'conversion'])
    ->name('account.conversion');

Route::get('/send/{expense}/{account}/{users}', function($expense, $account, $users){
        event(new NewExpenseNotification($expense, $account, $users));
});


/* Oauth */
Route::get('/sign-in/github', 'AuthController@github');
Route::get('/sign-in/github/redirect', 'AuthController@githubRedirect');

Route::get('user-account/{account}/edit', 'RelAccountUserController@edit')->name('user-account.edit');
Route::get('user-account/{id}/show', 'RelAccountUserController@show')->name('user-account.show');
Route::get('transaction/{id}/show', 'TransactionsController@show')->name('transaction.show');
Route::get('/destination', [TransactionsController::class, 'destination'])->name('transaction.destination');

