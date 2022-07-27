<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'item_table',
        'action'
    ];

    public static $CREATE = 'add';
    public static $MODIFY = 'modify';
    public static $DELETE = 'delete';

}
