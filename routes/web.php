<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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
    return redirect(route('books.index'));
});

// Route::get('/book', [BookController::class, 'index'])->name('book');
// Route::get('/book/create', [BookController::class, 'create'])->name('create-book');

// Route::get('/author', [AuthorController::class, 'index'])->name('author');

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
