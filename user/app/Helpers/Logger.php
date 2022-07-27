<?php

namespace App\Helpers;

class Logger{
    public static function generateReport($item1, $item2, $action = 'create')
    {
        if($action === 'create')
        {
            return "Create new item with the information of: $item1";
        }elseif($action === 'edit'){
            return "Modify data from $item1 to $item2";
        }elseif($action === 'delete'){
            return "Delete item with the information of: $item1";
        }
    }
}
