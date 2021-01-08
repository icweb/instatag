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
    return redirect()->route('home');
});

//Auth::routes([
//    'register' => false,
//    'reset' => false,
//    'verify' => false,
//]);

Route::group(['middleware' => ['auth']], function(){

    Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('home');

    Route::resource('groups', '\App\Http\Controllers\GroupsController');

    Route::resource('hashtags', '\App\Http\Controllers\HashtagsController')->except(['create']);
    Route::get('hashtags/create/{group}', '\App\Http\Controllers\HashtagsController@create')->name('hashtags.create');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect()->route('home');
})->name('dashboard');
