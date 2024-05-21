<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowedBooks;

class BorrowedBookController extends Controller
{

    public function displayBorrowed (){
        return BorrowedBooks::all();
    }
}
