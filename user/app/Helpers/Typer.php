<?php

namespace App\Helpers;

use Faker\Core\Number;

class Typer {

    private static $TYPES = [
        '' => 0,
        'Book Fair' => 1,
        'DMPR' => 2,
        'Book Review' => 3,
        'Book Trailer' => 4,
        'Dynamic Website' => 5,
        'EMPIRE State Book Tour' => 6,
        'Marketing Kit' => 7,
        'Online Brand Publicity' => 8,
        'Press Release' =>9,
        'Print Advertising' =>10,
        'Publishing Package | BW' =>11,
        "Publishing Package | Children's" => 12,
        'Publishing Package | FC' =>13,
        'Publishing Package | eBook' =>14,
        'Radio Interview' =>15,
        'Social Media Advertising' =>16,
        'TFOS' =>17,
        'WTO' =>18,
    ];

    public static function getNumericType($string = '')
    {
        return self::$TYPES[$string];
    }

    public static function getStringType($number = 0)
    {
        return array_search($number,self::$TYPES);
    }



}
