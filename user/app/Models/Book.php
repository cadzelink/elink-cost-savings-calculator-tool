<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table='book_price';

    protected $fillable = [
        'package',
        'cover',
        'size',
        'cover_cost',
        'cost_per_page',
        'status'
    ];

    public $timestamps=false;

}
