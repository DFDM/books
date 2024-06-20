<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books_sales extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'books_sales';
    protected $guarded = [];

    public function books() {
        return $this->belongsTo(Book::class, 'books_id', 'id');
    }

    public function sales() {
        return $this->belongsTo(Sale::class, 'sales_id', 'id');
    }
}
