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
    return view('welcome');
})->name('home');

#Route::namespace('Web')->group(function() {
	#Route::resource('teams', 'TeamController');
# route group prefix example
#Route::group(['namespace' => 'Web', 'prefix' => 'testing'], function() {
Route::group(['namespace' => 'Web'], function(){
	Route::resource('teams', 'TeamController');

	Route::get('/teams/{team}/title', function(\App\Team $team){
		return response()->jTitle($team);
	});

	Route::get('/teams/{team}/activate', function(){
		return view('team/activate');
	})->name('activateTeam')->middleware('signed');
});

Route::get('/square/{number?}', function($number = 10){
	return $number * $number;
});