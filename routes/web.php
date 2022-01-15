<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Search;
use App\Http\Controllers\Detailpage;

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

Route::get("/",[Home::class,'index']);
Route::post("/search",[Search::class,'getserchterm']);
Route::get("/detail/{type}/{id}",[Detailpage::class,'index']);
