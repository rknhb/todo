<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Auth::routes(['register' => false]);

Route::get('/', [App\Http\Controllers\TodoController::class, 'main'])->name('main');

Route::get('/add', [App\Http\Controllers\TodoController::class, 'add'])->name('add');

Route::post('/add', [App\Http\Controllers\TodoController::class, 'store'])->name('store');

Route::get('/edit/{id}', [App\Http\Controllers\TodoController::class, 'edit'])->name('edit');

Route::post('/edit/{id}', [App\Http\Controllers\TodoController::class, 'update'])->name('update');

Route::post('/delete/{id}', [App\Http\Controllers\TodoController::class, 'delete'])->name('delete');