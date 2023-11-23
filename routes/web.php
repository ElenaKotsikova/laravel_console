<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/hlo', function () {
    return 'Hello';
});

Route::options('/')->name('home');

Route::match(['get', 'post'], '/match');

Route::any('/any');

// Внедрение зависимости

Route::get('/books', function (\Illuminate\Http\Request $request) {
    return '...';
});

// Перенаправление

Route::redirect('/from', '/to', 301);


// Представления

Route::view('/not-found', 'not-found');

// Параметры

Route::get('/books/{id}', function ($id) {
    return 'Книга #' . $id;
});

Route::get('/books/{book}/comment/{comment}', function ($bookId, $commentId) {

});

Route::get('/books/{id}', function (Request $request, $id) {
    return 'Книга #' . $id;
})->name('book.id');

Route::get('/books/{?id}', function ($id) {
    return 'Книга #' . $id;
});

// BookController
// ...
// redirect('home');

// /books/1
// $url = route('book.id', ['id' => 1]);

Route::controller(BookController::class)->prefix('/books')->group(function () {
    Route::get('/', 'index')->name('books.index');
    Route::get('/{id}', 'show')->name('book');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('book');
