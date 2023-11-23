<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(BookController::class)->prefix('/books')->group(function () {
    Route::get('/', 'index')->name('books.index');
    Route::get('/{book}', 'show')->name('book');
    Route::post('/', 'store')->name('books.store');
    Route::put('/{book}', 'update')->name('books.update');
    Route::patch('/{book}', 'update')->name('books.update');

    Route::post('/{book}/review', 'reviewStore')->name('review.store');

    // -- web --
    // vRoute::get('/create', 'create')->name('books.create');
    // vRoute::post('/', 'store')->name('books.store');
});
