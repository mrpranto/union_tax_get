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
    return redirect()->route('login');
});

Route::get('/page', function () {
    return view('printpage');
})->name('page');

Route::get('/notice', function () {
    return view('notice.notice');
})->name('notice');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'],function (){

    Route::resource('tax-register', 'TaxRegisterController');
    Route::get('get-villages', 'TaxRegisterController@getVillages')->name('get.villages');

    Route::resource('tax-get', 'TaxGetController');

});
