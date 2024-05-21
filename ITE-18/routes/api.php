<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\BorrowedBooksController;
use App\Http\Controllers\BorrowersController;
use App\Http\Controllers\UserController;
use App\Models\BorrowedBooks;
use App\Models\Borrowers;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// user Api
Route::get('user',[UserController::class,'viewUser']);

// borrowers API
Route::post('borrow/book',[BorrowersController::class,'borrowBook']);
Route::get('display/borrows/book',[BorrowersController::class,'viewBorrowers']);
// borrowed book API


//book API
Route::get('display/books',[BooksController::class,'showBooks']);

Route::post('add/book', [BooksController::class, 'store']);

//search book
Route::get('search/book/{title?}',[BooksController::class,'search']);
//delete book
Route::delete('/delete/book/{title}', [BooksController::class, 'delete']);

//display borrowed books
Route::get('display/borrowed/books',[BorrowedBookController::class,'displayBorrowed']);
