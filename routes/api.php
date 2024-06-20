<?php

use App\Http\Controllers\Api\Book\Books;
use App\Http\Controllers\Api\Sale\Sales;
use App\Http\Controllers\Api\User\AccessToken;

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
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/books', [Books::class, 'index']);

    Route::post('/sale', [Sales::class, 'store']);



    Route::delete('/access-tokens', [AccessToken::class, 'destroy']);
});


Route::get('/booksaithavatars', [Books::class, 'withAvatars']);

Route::post('/access-tokens', [AccessToken::class, 'store']);
