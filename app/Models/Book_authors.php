<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Book_authors extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    public $incrementing = false;

    protected $table = 'book_authors';
    protected $guarded = [];

}
