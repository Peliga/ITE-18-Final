<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBooks;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Borrowers;

class BorrowersController extends Controller
{
    public function viewborrowers(){
        return Borrowers::all();
    }
    public function borrowBook(Request $request){
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string',
            'book_title' => 'required|string'
        ]);

        if($validatedData->fails()){
            return response()->json(['error' => $validatedData->errors()], 400);
        }

        try {
            $borrower = new Borrowers();
            $borrower->name = $request->name;
            $borrower->book_title = $request->book_title;
            $borrower->save();

            $borrowedBook = new BorrowedBooks();
            $borrowedBook->name = $request->name;
            $borrowedBook->book_title = $request->book_title;
            $borrowedBook->save();

            return ["Result" => "Book added successfully"];
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
