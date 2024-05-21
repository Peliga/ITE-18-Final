<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Books extends Model
{
    use HasFactory;

    protected $table = "books";

    protected $fillable = [
        'title',
        'author',
        // 'image',
        'published_at',
        'category',
        'description'
    ];

    protected $appends = [
        'author_title'
    ];

    public function getAuthorTitleAttribute(){
        return $this->title  . " - " . $this->author;
    }
}
