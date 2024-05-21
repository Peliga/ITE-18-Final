<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowersController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


// user Api
Route::get('user',[UserController::class,'viewUser']);

// borrowers API
Route::post('borrow/book',[BorrowersController::class,'add']);
Route::get('borrowers',[BorrowersController::class,'viewBorrowers']);
// borrowed book API


//book API
Route::get('books',[BooksController::class,'showBooks']);

Route::post('add/book', [BooksController::class, 'store']);

Route::post('borrow_book', [BorrowersController::class, 'borrow']);
