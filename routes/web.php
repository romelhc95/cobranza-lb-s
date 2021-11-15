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

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login')->name('login')->middleware('guest');
Route::post('login', 'Auth\LoginController@login');

//Cliente
Route::group([
    'middleware' => 'client',
    'prefix' => 'client',
    'namespace' => 'Client'
], function () {

    Route::resource('client', 'ClientController');
    
});

//Administrador
Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/summary', 'SummaryController@index')->name('summary');

    Route::get('/summaryLoan', 'SummaryController@summaryloan')->name('summaryloan');

    Route::get('/summaryCollected', 'SummaryController@summarycollected')->name('summarycollected');

    Route::resource('sectors', 'SectorController')
        ->except('show');

    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');

    Route::resource('loans', 'LoanController')
        ->except('show');

    Route::resource('payments', 'PaymentController');

});

Route::post('logout', 'Auth\LoginController@logout');