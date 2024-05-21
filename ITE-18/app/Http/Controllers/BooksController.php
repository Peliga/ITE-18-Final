<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    public function showBooks() {
        return Books::all();
    }

    public function store(Request $request)
    {

        $book = new Books;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->category = $request->category;
        $book->description = $request->description;
        // $book->image = $request->image;
        $book->published_at = $request->published_at;

        $result = $book->save();

        if($result){
            return ["Result"=>"Book added"];
        }else{
            return ["Result"=>"Opertaion failed"];
    }
    }
    public function search($title='') {
        $books = Books::where('title', 'like', '%' . $title . '%')->get();

        if(count($books)>0){
            return $books;
        }else{
            return ["result"=>"product not found"];
        }
    }

    public function delete($title)
    {
        $book = Books::where('title', $title)->first();

        if (!$book) {
            return response()->json(['message' => 'Book not found.'], 404);
        }

        $book->delete();
        return response()->json(['message' => 'Book deleted successfully.'], 200);
    }


}
