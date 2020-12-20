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
// Route::get('/profile/{id}','App\Http\Controllers\Profile@index')->middleware('checkuser');
Route::get('/profile/{id}','App\Http\Controllers\Profile@index');
// Update Acount
Route::post('/updateuser','App\Http\Controllers\Profile@updateuser')->name('updateuser');

Route::post('/updatepassword','App\Http\Controllers\Profile@updatepassword')->name('updatepassword');

Route::get('/showfavorite','App\Http\Controllers\Profile@showfavorite')->name('showfavorite');
// 
Route::get('/logout','App\Http\Controllers\Login@logout')->name('logout');

Route::get('/form','App\Http\Controllers\Login@index')->name('form')->middleware('checkuser');;

Route::post('/register','App\Http\Controllers\Login@register')->name('register');

Route::post('/login','App\Http\Controllers\Login@login')->name('login');
// home
Route::get('/','App\Http\Controllers\Home@index')->name('home');

Route::post('/ajaxmovie','App\Http\Controllers\Home@ajax')->name('ajaxmovie');

Route::get('/movie','App\Http\Controllers\Movie@index')->name('new');

Route::get('/movie/{id}','App\Http\Controllers\Movie@show');

Route::get('/tvshow/{id}','App\Http\Controllers\Movie@tvshow');

Route::post('/ajaxgetmoviepopular','App\Http\Controllers\Movie@ajaxGetMoviePopular');

Route::post('/playmovie','App\Http\Controllers\Movie@playMovie');
// 
Route::get('/tvshow','App\Http\Controllers\ListMovie@tvshow')->name('tvshow');

Route::get('/toprate','App\Http\Controllers\ListMovie@toprate')->name('toprate');

Route::get('/theater','App\Http\Controllers\ListMovie@theater')->name('theater');

// Comment
Route::post('/ajaxcomment','App\Http\Controllers\Movie@ajaxcomment')->name('ajaxcomment');

Route::post('/ajaxinteract','App\Http\Controllers\Movie@ajaxinteract')->name('ajaxinteract');

Route::post('/ajaxpost','App\Http\Controllers\Movie@ajaxpost')->name('ajaxpost');

Route::get('/actor','App\Http\Controllers\Actor@index');

Route::get('/actor/{id}','App\Http\Controllers\Actor@show');

// Yêu thích

Route::post('/favorite','App\Http\Controllers\Movie@favorite')->name('favorite');

Route::post('/favoriteTV','App\Http\Controllers\Movie@favoriteTV')->name('favoriteTV');
