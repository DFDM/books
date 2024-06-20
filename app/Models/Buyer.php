<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Buyer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'buyers';
    protected $guarded = [];

    public function sales() {
        return $this->hasMany(Sale::class, 'buyers_id', 'id');
    }
}
    