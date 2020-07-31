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

Route::get('/home', function(){
    return redirect('/');
});
Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/participate/{tournament_id}', 'TournamentController@participate')->middleware('auth');
Route::get('/profile', 'UserController@profile')->middleware('auth');
Route::patch('/profile/{password}', 'UserController@update')->middleware('auth');
Route::get('/participations', 'UserController@participations')->middleware('auth');
Route::post('/addMoney', 'UserController@addMoney')->middleware('auth');


Route::middleware(['admin'])->group(function () {
    Route::resource('/admin/games', 'GameController');
    Route::resource('/admin/tournaments', 'TournamentController');
    
    Route::resource('/admin/users', 'UserController');
    Route::get('/admin/participant/{tournament_id}', 'TournamentController@participant');

    Route::resource('/admin', 'AdminController');
});