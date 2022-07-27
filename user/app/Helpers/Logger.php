<?php

namespace App\Helpers;

class Logger{
    public static function generateReport($item1, $item2 = [], $action = 'create')
    {
        if($action === 'create')
        {
            return "Create new item with the information of: \n". implode("--", $item1);
        }elseif($action === 'modify'){
            return "Modify data from \n". implode("--",$item1)." to \n".implode("--",$item2);
        }elseif($action === 'delete'){
            return "Delete item with the information of: \n".implode("--",$item1);
        }
    }
}
