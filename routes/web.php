<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProdukController;
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
Route::get('/film', [FilmController::class, 'index'])->name('films.index');
Route::get('/film/create', [FilmController::class, 'create']);
Route::post('/film/create', [FilmController::class, 'store']);
Route::get('/film/destroy/{id}', [FilmController::class, 'destroy']);



Route::get('/artists', [ArtistsController::class, 'index'])->name('artists.index');
Route::get('/artists/create', [ArtistsController::class, 'create']);
Route::post('/artists/create', [ArtistsController::class, 'store']);
Route::get('/artists/destroy/{id}', [ArtistsController::class, 'destroy']);
Route::get('/artists/edit/{id}', [ArtistsController::class, 'edit']);
Route::get('/artists/{id}/profile', [ArtistsController::class, 'show']);
Route::post('/artists/edit/{id}', [FilmController::class, 'update']);
Route::get('/artists/list', [ArtistsController::class, 'getArtists'])->name('artists.list');


Route::get('/gallery', [GalleryController::class, 'index']);





Route::get('/item', [ItemController::class, 'index'])->name('items.index');
Route::get('/item/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/item/create', [ItemController::class, 'store'])->name('items.create');
Route::get('/item/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
Route::post('/item/update/{id}', [ItemController::class, 'update'])->name('items.update');
Route::get('/item/destroy/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
Route::get('/allitem', [ItemController::class, 'getItems'])->name('items.all');



Route::get('/film/list', [FilmController::class, 'getFilms'])->name('films.list');
Route::get('/film/edit/{id}', [FilmController::class, 'edit']);
Route::post('/film/edit/{id}', [FilmController::class, 'update']);


Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/getproducts', [ProdukController::class, 'getProducts'])->name('get.produk');


Route::get('/inject', function(){
    return view('inject');
});
Route::get('/wadah', function(){
    return view('tempat');
});



Route::get('/allfilm', [FilmController::class, 'allfilm']);
