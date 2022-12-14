<?php

use App\Http\Controllers\SearchController;
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
    return view('layouts\search');
});
//Route::get('/', [SearchController::class, 'index'])->name('search');
//Route::resource('search', SearchController::class);
Route::get('/search', ['App\Http\Controllers\SearchController', 'searchByWord'])->name('search');

