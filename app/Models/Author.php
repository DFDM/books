<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Author extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $table = 'authors';
    protected $guarded = [];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors', 'author_id', 'books_id');
    }
}
