<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\products_controller;

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
    return view('home');
});

Route::get('/add-product',[products_controller::class,'show']);
Route::post('/add-product',[products_controller::class,'add']);

Route::get('/products',[products_controller::class,'showProducts']);

Route::get('/buy/{id}',[products_controller::class,'buy']);

Route::get('/dashboard',[products_controller::class,'showDashboard']);

Route::get('/transaction',[products_controller::class,'showTransactions']);
