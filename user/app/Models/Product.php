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

    private static $TYPES = [
        '',
        'Book Fair',
        'DMPR',
        'Book Review',
        'Book Trailer',
        'Dynamic Website',
        'EMPIRE State Book Tour',
        'Marketing Kit',
        'Online Brand Publicity',
        'Press Release',
        'Print Advertising',
        'Publishing Package | BW',
        "Publishing Package | Children's",
        'Publishing Package | FC',
        'Publishing Package | eBook',
        'Radio Interview',
        'Social Media Advertising',
        'TFOS',
        'WTP',
    ];

    public function getStringType()
    {
        return self::$TYPES[$this->type];
    }
}
