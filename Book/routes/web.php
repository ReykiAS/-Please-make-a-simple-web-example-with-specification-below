<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\FamousController;
use App\Http\Controllers\RatingController;


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


Route::get('/', [BooksController::class, 'index'])->name('welcome');
Route::get('/famous', [FamousController::class, 'index'])->name('famous');
Route::get('/voter', [BooksController::class, 'add'])->name('voter');

// Route::get('/authors', [RatingController::class, 'index'])->name('authors');

Route::get('/books', [RatingController::class, 'index']);
Route::post('/give-rating', [RatingController::class, 'giveRating'])->name('ratings.giveRating');
Route::get('/filter-books-by-author/{authorId}', [RatingController::class, 'filterBooksByAuthor']);