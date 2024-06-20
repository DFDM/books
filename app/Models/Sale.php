<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sales';
    protected $guarded = [];

    public function buyer() {
        return $this->belongsTo(Buyer::class, 'buyers_id', 'id');
    }

    public function books() {
        return $this->belongsToMany(Book::class, 'books_sales', 'sales_id', 'books_id');
    }
}
