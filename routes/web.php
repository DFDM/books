<?php

use App\Http\Controllers\Authors;
use App\Http\Controllers\Books;
use App\Http\Controllers\Buyers;
use App\Http\Controllers\Home;

use App\Http\Controllers\Sales;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [Home::class, 'index'])->name('home.index');

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/books', [Books::class, 'index'])->name('books.index');
    Route::get('/books/create', [Books::class, 'create'])->name('books.create');
    Route::post('/books', [Books::class, 'store'])->name('books.store');
    Route::get('/books/{book}', [Books::class, 'show'])->name('books.show');
    Route::get('/books/{book}/edit', [Books::class, 'edit'])->name('books.edit');
    Route::patch('/books/{book}', [Books::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [Books::class, 'destroy'])->name('books.destroy');

    Route::get('/buyers', [Buyers::class, 'index'])->name('buyers.index');
    Route::get('/buyers/create', [Buyers::class, 'create'])->name('buyers.create');
    Route::post('/buyers', [Buyers::class, 'store'])->name('buyers.store');
    Route::get('/buyers/{buyer}', [Buyers::class, 'show'])->name('buyers.show');
    Route::get('/buyers/{buyer}/edit', [Buyers::class, 'edit'])->name('buyers.edit');
    Route::patch('/buyers/{buyer}', [Buyers::class, 'update'])->name('buyers.update');
    Route::delete('/buyers/{buyer}', [Buyers::class, 'destroy'])->name('buyers.destroy');

    Route::get('/sales', [Sales::class, 'index'])->name('sales.index');
    Route::get('/sales/create', [Sales::class, 'create'])->name('sales.create');
    Route::post('/sales', [Sales::class, 'store'])->name('sales.store');
    Route::get('/sales/{sale}', [Sales::class, 'show'])->name('sales.show');
    Route::get('/sales/{sale}/edit', [Sales::class, 'edit'])->name('sales.edit');
    Route::patch('/sales/{sale}', [Sales::class, 'update'])->name('sales.update');
    Route::delete('/sales/{sale}', [Sales::class, 'destroy'])->name('sales.destroy');


    Route::get('/authors', [Authors::class, 'index'])->name('authors.index');
    Route::get('/authors/create', [Authors::class, 'create'])->name('authors.create');
    Route::post('/authors', [Authors::class, 'store'])->name('authors.store');
    Route::get('/authors/{author}', [Authors::class, 'show'])->name('authors.show');
    Route::get('/authors/{author}/edit', [Authors::class, 'edit'])->name('authors.edit');
    Route::patch('/authors/{author}', [Authors::class, 'update'])->name('authors.update');
    Route::delete('/authors/{author}', [Authors::class, 'destroy'])->name('authors.destroy');
});



