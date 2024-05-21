<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBooks extends Model
{
    use HasFactory;

    protected $table = "borrowed_books";

    protected $fillable = [
        'name',
        'book_title'
    ];
}
