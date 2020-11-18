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
    return view('welcome');
});

Auth::routes();
//OFLINE THEME
Route::get('/offline',function(){
    return view('offline');
});
//GET
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\HomeController::class,'userPage'])->name('user');
Route::get('/invoice', [App\Http\Controllers\HomeController::class,'invoicePage'])->name('invoice');


//POSTS
Route::post('ticket', [App\Http\Controllers\TicketController::class,'store'])->name('guardarT');
Route::post('coment', [App\Http\Controllers\TicketController::class,'commentS'])->name('guardarC');
Route::post('changeS', [App\Http\Controllers\TicketController::class,'changeS'])->name('changeS');
Route::post('changeSF', [App\Http\Controllers\FacturaController::class,'changeSF'])->name('changeSF');

Route::post('storeU',[App\Http\Controllers\FacturaController::class,'storeU'])->name('storeU');
Route::post('storeI',[App\Http\Controllers\FacturaController::class,'store'])->name('storeI');