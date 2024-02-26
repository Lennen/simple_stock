<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/purchase', function () {
    return view('purchase');
})->name('purchase');

Route::post('purchase/submit1', function () {
    return dd(Request::all());
})->name('submit');

Route::get('purchase/submit/all/{id}', 'App\Http\Controllers\PurchaseController@showOneMessage')->name('submitAllone');
Route::get('purchase/submit/all/{id}/update', 'App\Http\Controllers\PurchaseController@updateMessage')->name('messageUpdate');
Route::post('purchase/submit/all/{id}/update', 'App\Http\Controllers\PurchaseController@updateMessageResult')->name('messageUpdateResult');

Route::get('purchase/submit/all/{id}/delete', 'App\Http\Controllers\PurchaseController@deleteMessage')->name('deleteMessage');
Route::post('purchase/submit/all/deletemulti', 'App\Http\Controllers\PurchaseController@deleteMulti')->name('deleteMulti');


Route::get('purchase/submit/all', 'App\Http\Controllers\PurchaseController@allData')->name('submitAll');
Route::post('purchase/submit', 'App\Http\Controllers\PurchaseController@submit')->name('submit');



