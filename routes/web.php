<?php

use App\Http\Controllers\ItemController;
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





Route::get('/item', [ItemController::class, 'index'])->name('items.index');
Route::get('/item/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/item/create', [ItemController::class, 'store'])->name('items.create');
Route::get('/item/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
Route::post('/item/update/{id}', [ItemController::class, 'update'])->name('items.update');
Route::get('/item/destroy/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
Route::get('/allitem', [ItemController::class, 'getItems'])->name('items.all');


