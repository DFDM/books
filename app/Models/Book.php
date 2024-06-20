<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $table = 'books';
    protected $guarded = [];

    public function sales() {
            return $this->belongsToMany(Sale::class, 'books_sales', 'books_id', 'sales_id');
    }

    public function authors() {
        return $this->belongsToMany(Author::class, 'book_authors', 'books_id', 'author_id');
    }
}
