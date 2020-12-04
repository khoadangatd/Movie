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
Route::get('/profile/{id}','App\Http\Controllers\Profile@index')->middleware('checkuser');
// Update Acount
Route::post('/updateuser','App\Http\Controllers\Profile@updateuser')->name('updateuser');

Route::post('/updatepassword','App\Http\Controllers\Profile@updatepassword')->name('updatepassword');
// 
Route::get('/logout','App\Http\Controllers\Login@logout')->name('logout');

Route::get('/form','App\Http\Controllers\Login@index')->name('form');

Route::post('/register','App\Http\Controllers\Login@register')->name('register');

Route::post('/login','App\Http\Controllers\Login@login')->name('login');

Route::get('/','App\Http\Controllers\Home@index')->name('home');

Route::get('/movie','App\Http\Controllers\Movie@index');

Route::get('/actor','App\Http\Controllers\Actor@index');

Route::get('/actor/{id}','App\Http\Controllers\Actor@show');
