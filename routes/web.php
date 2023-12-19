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
