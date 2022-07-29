<?php

namespace App\Helpers;

use Faker\Core\Number;

class Typer {

    private static $TYPES = [
        '' => 0,
        'DMPR' => 1,
        'Book Fair' => 2,
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
        'WTP' =>18,
    ];

    public static function getNumericType($number = '')
    {
        return self::$TYPES[$number];
    }

}
