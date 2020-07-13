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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'Home@index');
Route::get('teamInfo/{id}', 'Home@getTeamMembers');

// Team Routes
Route::get('addTeam', 'Home@addTeam');
Route::post('saveTeamData', 'Home@saveTeamData');
Route::get('editTeam/{id}', 'Home@editTeam');
Route::post('deleteTeam', 'Home@deleteTeam');

// Team Players routes
Route::get('addTeamPlayer', 'Home@addTeamPlayer');
Route::post('saveTeamPlayerData', 'Home@saveTeamPlayerData');
Route::get('editTeamPlayer/{id}', 'Home@editTeamPlayer');
Route::post('deleteTeamPlayer', 'Home@deleteTeamPlayer');



Route::get('matches', 'Home@matches');
