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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

 // borrar caché de ruta
 Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

// borrar caché de configuración
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
}); 

// borrar caché de vista
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();
Route::get('/', function () {
    if (auth()->user()->is_admin){
        return redirect()->route('home');
    }else{
        return redirect()->route('client.index');
    }
})->middleware('auth');

Route::get('home', function () {
    if (auth()->user()->is_admin){
        return redirect()->route('home');
    }else{
        return redirect()->route('client.index');
    }
})->middleware('auth');

//Cliente
Route::group([
    'middleware' => 'client',
    'prefix' => 'client',
    'namespace' => 'Client'
], function () {
Route::resource('client', 'ClientController');
//    ->middleware('auth');
});

//Administrador
Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {

    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

    Route::get('/summary', 'SummaryController@index')->name('summary')->middleware('auth');

    Route::get('/summaryLoan', 'SummaryController@summaryloan')->name('summaryloan')->middleware('auth');

    Route::get('/summaryCollected', 'SummaryController@summarycollected')->name('summarycollected')->middleware('auth');

    Route::resource('sectors', 'SectorController')
        //->middleware('auth')
        ->except('show');

    Route::resource('users', 'UserController');
        //->middleware('auth');

    Route::resource('roles', 'RoleController');

    Route::resource('loans', 'LoanController')
        //->middleware('auth')
        ->except('show');

    Route::resource('payments', 'PaymentController');
        //->middleware('auth');
});

