<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='calculator';

    protected $fillable=[
        'product',
        'gross',
        'net',
        'unit',
        'type',
        'status'
    ];

    public $timestamps = false;
}
