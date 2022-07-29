<?php

namespace App\Imports;

use App\Models\Book;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collections)
    {
        $collects = collect();
        foreach($collections as $collection)
        {
            $book = Book::where('package', "LIKE", $collection['package']."%")
                ->where('cover', 'LIKE', $collection['cover']."%")
                ->where('size', 'LIKE', $collection['size']."%")
                ->first();
            $newCollection = [];
            if(!$book)
            {
                $newCollection = Arr::add($collection, 'create', true);
            }else{
                if($book->cover != $collection['cover'] || $book->size != $collection['size'] || $book->cover_cost != $collection['cover_cost'] || $book->cost_per_page != $collection['cost_per_page']){
                    $newCollection = Arr::add($collection, 'create', false);
                }
            }

            if($newCollection != []){
                $collects->push(Arr::except($newCollection, ['id']));
            }
        }
        // $collects->splice($collects->count() -1, 1);

        session()->put('bookSession', $collects);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
